<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
class TemplateController extends Controller
{
    

    public function index()
    {
    	
    	$templates = Template::where(['status'=>1])->get();
    	return view('templates/index',['templates' => $templates]);

    }
    public function create()
    {
    	$template = new Template;
    	return view('templates/create',['template' => $template]);

    }
    public function edit($id)
    {
    	$template = Template::find($id);
    	return view('templates/create',['template' => $template]);

    }
    public function assign()
    {
    	$templates = Template::where(['status'=>1])->get();
    	return view('templates/assign',['templates' => $templates]);
    }
    public function gettemplate(Request $request)
    {
    	$id = $request->get('id');
    	$template = Template::find($id);
    	$content = '';
    	if(!empty($template->content)):
    		$content = unserialize($template->content);
    	endif;
    	return view('templates/content',['content' => $content]);
    	 
    }
    public function add_field(Request $request)
    {
    	$post = $request->all();
    	$template = new Template;

    	if(!empty($request->get('id')))
    	{
    		$template = Template::find($request->get('id'));
    	}
    	$content = unserialize($template->content);
    	if(!is_array($content))
    		$content = [];

    	if($post['content_type'] == 'radio' || $post['content_type'] == 'select' || $post['content_type'] == 'checkbox')
    		$post_content =  array('label' => $post['content_label'],'content_type' => $post['content_type'] ,'select_label' =>$post['select_label'],'select_value' => $post['select_value']);
    	else
    		$post_content =  array('label' => $post['content_label'],'content_type' => $post['content_type']);
    	//print"<pre>";print_r($post_content);die;
    	array_push($content, $post_content);
    	$template->template_name = $post['template_name'];
    	$template->content = serialize($content);
    	$template->save();

		return redirect('/edit/'.$template->id);

    }
}
