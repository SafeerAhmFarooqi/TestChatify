<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post;
use App\Models\Comments;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GroupChat extends Component
{
    use WithFileUploads;

    public $postImage='';
    public $postText='';
    public $commentText='';
    public $currentPostId=0;
    public $currentUserId=0;
    public $groupId=0;
    public $postsPerPage=2;
    public $selectedPostId=0;
    public $selectedCommentId=0;

    public function currentId($userId,$postId)
    {
        $this->currentUserId=$userId;
        $this->currentPostId=$postId;
    }


    public function submit()
    {
       
        $this->validate([
            'postImage' => 'image|mimes:png,jpeg,gif,bmp|max:1024', // 1MB Max
            'postText' => 'required',
        ]);
        
        if($this->postImage)
        {
            $file=$this->postImage;
            $filename= $file->hashName();
            $file->store('user_post_pics/','public');
 
             $pic=$filename;
            
        }
        else{
            $pic=null;
        }
 
         $user=Auth::user()->id;
 
         $model = new Post();
         $model->post_text=$this->postText;
         $model->user_id=$user;
         $model->group_id=$this->groupId;
         $model->post_image=$pic;
         $model->save();
         $this->postImage='';
         $this->postText='';
    }

    
    public function render()
    {
        $posts= Post::with(['comments' => function ($query) {
            $query->with('user')
            ->orderBy('id', 'desc');
        }])
        ->with('user')
        ->where('group_id',$this->groupId)
        ->orderBy('id','desc')
        ->paginate($this->postsPerPage);;
        $group=Group::find($this->groupId);
        return view('livewire.group-chat',[
            'posts'=>$posts,
            'group'=>$group,
        ]);
    }

    public function saveComment()
    {
        $this->validate([
            'commentText' => 'required',
        ]);

        $model=new Comments();
        $model->user_id=$this->currentUserId; 
        $model->post_id=$this->currentPostId; 
        $model->comment=$this->commentText;
         $model->save();
         $this->currentUserId=0;
         $this->currentPostId=0;
         $this->commentText='';
    }

    public function loadMore()
    {
        $this->postsPerPage += 2;
    }

    public function selectPostId($id)
    {
        $this->selectedPostId=$id;
    }

    public function selectCommentId($id)
    {
        $this->selectedCommentId=$id;
    }

    public function deletePost()
    {
        $post=Post::find($this->selectedPostId);
        storage::disk('public')->delete('user_post_pics/'.$post->post_image);
        $post->delete();
        Comments::where('post_id',$this->selectedPostId)->delete();
        $this->selectedPostId=0;
    }

    public function deleteComment()
    {
            Comments::find($this->selectedCommentId)->delete();
            $this->selectedCommentId=0;
    }
}
