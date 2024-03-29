<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UrlImport;

class CommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        abort_if(Gate::denies('comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_url' => 'required|file|mimes:csv,xlsx,xls', // Validate that the uploaded file is a CSV file
        ]);

        $file = $request->file('comment_url');

        try {
            // Import the URLs from the CSV file using the UrlImport class
            Excel::import(new UrlImport(), $file);

            dd('URLs imported successfully.');
        } catch (\Exception $e) {
            dd('Error importing URLs: ' . $e->getMessage());
        }
    }

    public function edit(Comment $comment)
    {
        abort_if(Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.edit', compact('comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->route('admin.comments.index');
    }

    public function show(Comment $comment)
    {
        abort_if(Gate::denies('comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        abort_if(Gate::denies('comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comment->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommentRequest $request)
    {
        $comments = Comment::find(request('ids'));

        foreach ($comments as $comment) {
            $comment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function fetchUrls(Request $request)
    {
        $numberOfUrls = $request->input('limit', 5); // default to 5 if not provided

        $urls = Comment::inRandomOrder()->limit($numberOfUrls)->pluck('comment_url');

        return response()->json($urls);
    }

    public function updateStatus(Request $request)
    {
         $url = $request->query('url');

        $status = $request->input('status');

        // Update the status in the database based on the provided URL
        Comment::where('comment_url', $url)->update(['status' => "Not Working"]);

        return response()->json(['message' => 'Status updated successfully']);
    }
}