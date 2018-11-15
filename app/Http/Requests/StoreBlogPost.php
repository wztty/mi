<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //设置验证规则
            'username'=>'required|regex:/\w{6,16}/|unique:users',
             'password'=>'required|regex:/\w{6,16}/',
             'repassword'=>'required|regex:/\w{6,16}/|same:password', 
             'email'=>'required|email',
             'phone'=>'required',
        ];
    }


    //自定义错误信息
    public function messages(){  

      return[            
              'username.required'=>'用户名不能为空',            
              'username.regex'=>'用户名必须为4-8位的任意数字字母下划线',            
              'username.unique'=>'用户名已存在',            
              'password.required'=>'密码不能为空',            
              'password.regex'=>'密码必须为6-16位的任意数字字母下划线',            
              'repassword.required'=>'重复密码不能为空',            
              'repassword.regex'=>'重复密码必须为6-16位的任意数字字母下划线',            
              'repassword.same'=>'两次密码不一致',                     
              'email.required'=>'邮箱不能为空',            
              'email.email'=>'邮箱格式不符合',                     
              'phone.required'=>'电话不能为空',            
              'phone.regex'=>'电话不符合规则'
 
 
              ];    } 
    
}



