<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Todo;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
 {
  
   public function __construct()
    {
      // do nothing
    }

    public function __destruct()
    {
      // do nothing
    }

    /**
     * 一覧画面
     */
  public function index()
  {
    $user = Auth::user();
    $user_id = Auth::id();
    $tags = Tag::all();
    $todos = Todo::where('user_id', $user_id)->get();
    
        // $todos = Todo::all();
    //$param = ['todos' => $todos, 'user' =>$user, 'tags' => $tags];
    // return view('index', compact('todos' , 'user'));
    //return view('index', $param);  
    return view('index', compact('todos', 'user', 'tags'));   
  }  

    /**
     * 登録処理
     */
    public function create(TodoRequest $request)
    {  
      $user_id = Auth::id();
      Todo::create(['content' => $request->content,
                    'tag_id' => $request->tag_id,
                    'user_id' => $user_id]);
      return redirect()->route('todo.index');
      }

    /**
     * 更新処理
     */
    public function update(TodoRequest $request, $id)
    {
        $todos = Todo::find($id);
        $todos->fill(['content' => $request->content,'tag_id' => $request->tag_id])->save();       
        return redirect()->route('todo.index');
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
      // テーブルから指定のIDのレコード1件を取得
        $todos = Todo::find($id);
        // レコードを削除
        $todos->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('todo.index');
      }

    /**
     * 検索画面
     */
  public function find()
  {
    $user = Auth::user();
    $user_id = Auth::id();
    $todos = Todo::where('user_id', $user_id)->get();
    $tags = Tag::all();
    //$param = ['todos' => $todos, 'user' =>$user, 'tags' => $tags];
    return view('find', compact('todos', 'tags', 'user'));    
  }  

      /**
     * 検索機能
     */
  public function search(SearchRequest $request)
  {  
    $user = Auth::user();
    $user_id = Auth::id();
    //$todos = Todo::where('user_id', $user_id)->get();
    $tags = Tag::all();
    //$param = ['todos' => $todos, 'tags' => $tags];

    //検索フォームに入力された値を取得
    $search_content = $request->input('search_content');
    $search_tag = $request->input('search_tag');
    $query = Todo::query();

    if(!empty($search_content)){
      $query->where('content', 'like', '%'.$search_content.'%');
    }
    if(!empty($search_tag)){
      $query = Todo::where('tag_id', $search_tag);
    }
    $todos = $query->get();
    return view('find', compact('todos', 'tags', 'user'));
  }  
}

