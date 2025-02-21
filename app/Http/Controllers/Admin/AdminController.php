<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Shop;
use App\Models\Shop_Category;
use App\Models\Location;
use App\Models\Voucher;
use App\Models\Post;
use App\Models\Comments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserAccountActivation;
use App\Mail\UserAccountDeActivation;
use App\Mail\ShopAccountActivation;
use App\Mail\ShopAccountDeactivation;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function dashboard()
    {
        $userCount=User::all()->count();
        $documentCount=User::where('file_path','!=','')->count();
        $activeUserCount=User::where('active_status',true)->count();
        $blockUserCount=User::where('active_status',false)->count();
        $groupCount=Group::all()->count();
        $shopCount=Shop::all()->count();
        $locationCount=Location::all()->count();
        $voucherCount=Voucher::all()->count();
        return view('Admin.dashboard',[
            'userCount'=>$userCount,
            'documentCount'=>$documentCount,
            'activeUserCount'=>$activeUserCount,
            'blockUserCount'=>$blockUserCount,
            'groupCount'=>$groupCount,
            'shopCount'=>$shopCount,
            'locationCount'=>$locationCount,
            'voucherCount'=>$voucherCount,
        ]);
    }


     public function users_list()
    {
        $users= User::all();
        return view('Admin.users_list',compact('users'));
    }

     public function groups_list()
    {
        $groups= Group::all();
        return view('Admin.groups_list',compact('groups'));
    }

      public function shops_list()
    {
        $shops= Shop::all();
        return view('Admin.shops_list',compact('shops'));
    }

      public function vouchers_list()
    {
        $vouchers= Voucher::all();
        return view('Admin.vouchers_list',compact('vouchers'));
    }

      public function users_posts()
    {
        //$user_posts= Post::all();

        // $user_posts=Post::leftjoin('users','users.id','=','posts.user_id')
        //         ->get([
        //             'posts.*',
        //             'users.firstname',
        //             'users.lastname',
        //             'users.email',
        //         ]);
        $user_posts=Post::with('user')
        ->withCount('comments')
        ->get();
        return view('Admin.users_posts_list',compact('user_posts'));
    }

public function userPostDelete($id)
{
    //return $id;
    $post=Post::find($id);

   // storage::delete(storage_path().'/app/public'.'/user_post_pics'.'/'.$post->post_image);
   // return Response::download(storage_path().'/app/public'.'/user_post_pics'.'/'.$post->post_image);

    //return Response::download(storage_path().'/app/public'.'/user_post_pics'.'/'.$post->post_image);
    if($post->post_image)
   {
    unlink(storage_path().'/app/public'.'/user_post_pics'.'/'.$post->post_image);    
   }
   $post->delete();
   Comments::where('post_id',$id)->delete();
   return back()->with('message', 'Post Deleted Successfully' );
}

    public function userPostView($id)
    {
        $post=Post::where('id',$id)
        ->with('user')
        ->with(['comments' => function ($query) {
            $query->with('user')
            ->get();
        }])
        ->first();
        return view('Admin.user-post-view',['post'=>$post]);
    }

    public function userCommentDelete($id)
    {
        $result=Comments::find($id)->delete();
        if ($result) {
            return back()->with('message', 'Comment Deleted Successfully' );
        } else {
            return back()->with('message', 'Unable to delete Comment' );
        }
    }

    public function active_status(Request $request,$id)
    {
        $user=user::find($id);
        if(!$user->active_status)
        {
             User::where('id',$id)->update([

                'active_status'=>1,
            ]);
            Mail::to($user->email)->send(new UserAccountActivation());
            return back()->with('message', 'Account Activation Email Has Been Sent to '.$user->email );
        }
         
        return redirect('Admin/users_list');
    }

    public function shop_status_active(Request $request,$id)
    {
        $shop=Shop::find($id);
        if(!$shop->shop_status)
        {
            Shop::where('id',$id)->update([

                'shop_status'=>1,
            ]);
            Mail::to($shop->email)->send(new ShopAccountActivation());
            return back()->with('message', 'Shop Account Activation Email Has Been Sent to '.$shop->email );
        }
        else
        {
            return back()->with('message', 'This account is either already Active or does not exist' );
        }
    }

    public function shop_status_deactive(Request $request,$id)
    {
        $shop=Shop::find($id);
        if($shop->shop_status)
        {
            Shop::where('id',$id)->update([

                'shop_status'=>0,
            ]);
            Mail::to($shop->email)->send(new ShopAccountDeactivation());
            return back()->with('message', 'Shop Account Deactivation Email Has Been Sent to '.$shop->email );
        }
        else
        {
            return back()->with('message', 'This account is either already Deactive or does not exist' );
        }
    }

     public function de_active_status(Request $request,$id)
    {

        $user=user::find($id);
        if($user->active_status)
        {
            User::where('id',$id)->update([

                'active_status'=>0,
            ]);
            Mail::to($user->email)->send(new UserAccountDeActivation());
            return back()->with('message', 'Account Deactivation Email Has Been Sent to '.$user->email );
        }
        return redirect('Admin/users_list');
    }

    public function group_active_status(Request $request,$id)
    {
        $group=Group::find($id);
        if(!$group->status)
        {
             Group::where('id',$id)->update([

                'status'=>1,
            ]);
            
        }
         
        return redirect('Admin/groups_list');
    }

     public function group_de_active_status(Request $request,$id)
    {

        $group=Group::find($id);
        if($group->status)
        {
            Group::where('id',$id)->update([

                'status'=>0,
            ]);
           
        }
        return redirect('Admin/groups_list');
    }


      public function user_delete(Request $request,$id)
    {
        $user=User::find($id);
        $email=$user->email;
         $result= User::where('id',$id)->delete();
         if($result)
         {
            return back()->with('message', 'User'.' '.$email.' has been deleted Successfully' );
         }
         else
         {
            return back()->with('message', 'Unable to delete User'.' '.$email );
         }
         
    }

    

     

      public function shop_delete(Request $request,$id)
    {
        $shop=Shop::find($id);
        $email=$shop->email;
         $result= Shop::where('id',$id)->delete();
         if($result)
         {
            return back()->with('message', 'Shop'.' '.$email.' has been deleted Successfully' );
         }
         else
         {
            return back()->with('message', 'Unable to delete Shop'.' '.$email );
         }
    }

       public function active_users()
    {
         $users= User::where('active_status',1)->get();
        return view('Admin.active_users',compact('users'));
    }

       public function block_users()
    {
         $users= User::where('active_status',0)->get();
        return view('Admin.block_users',compact('users'));
    }

    
    public function downloadPdf(Request $request)
    {
        return "safeer";
        storage::download($request->filePath,'MyDocument');
    }
   
    public function userAllPosts($id)
    {
        $posts=Post::where('user_id',$id)
        ->with('user')
        ->with('comments')
        ->get();
        $user=User::find($id);
        return view('Admin.users-all-posts',[
            'posts'=>$posts,
            'user'=>$user,
        ]);
    }



}
