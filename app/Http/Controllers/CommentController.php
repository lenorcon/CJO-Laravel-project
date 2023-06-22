<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $setRequest = array(
            'code' => '404',
            'message' => 'Somethin wrong',
        );

        if(Comment::create(
            ['post_id' => $request->input('post_id'),
            'comment' => $request->input('comment'),]
            )){
            $setRequest = [
                'code' => '201',
                'message' => 'Successfully inserted!',
            ];
        }
        echo json_encode($setRequest);

        
    }
    // public function getComment(Request $request){
    //     $post_id = $request->input('post_id');
    //     $comments = Comment::where('post_id',$post_id)->get();
    //     return $comments;

    // }
    public function getComment($id){
        $comments = Comment::where('post_id',$id)->get();
        return $comments;

    }

}
