<?php namespace App\Http\Controllers\Admin;

use App\Models\Log;
use Request;
use HttpRequest;

class AdminLogController extends AdminController
{
    public function getIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:log,id',
        ]);

        $log = Log::find(Request::get('id'));

        return response()->json($log);
    }

    public function getList()
    {
        $this->validate($request, [
            'page' => 'integer',
            'perPage' => 'integer',
        ]);

        $logs = parent::pagination(Log::select('id', 'title', 'email', 'mobile'));

        return response()->json($log);
    }

    public function postIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $inputs = Request::all();
        $log = Log::create($inputs);

        return response()->json($log);
    }

    public function putIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'exists|log,id',
            'title' => 'required',
            'content' => 'required',
        ]);

        $log = Log::find($inputs['id']);
        $log->title = $inputs['title'];
        $log->content = $inputs['content'];
        $log->save();

        return response()->json($log);
    }

    public function deleteIndex(HttpRequest $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:user,id',
        ]);

        $affectedRows = Log::destroy(Request::input('id')); 

        return response()->json(['affectedRows' => $affectedRows]);
    }

    public function deleteList(HttpRequest $request)
    {
        $this->validate($request, [
            'ids' => 'required',
        ]);

        $ids = Request::input('ids');
        $affectedRows = Log::destroy($ids);
        
        return $response->json(['affectedRows' => $affectedRows]);
    }
}