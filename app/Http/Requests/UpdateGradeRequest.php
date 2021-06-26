<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateGradeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lesson_grade_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'lesson_id'   => [
                'required',
                'integer'],
            'teacher_id' => [
                'required',
                'integer'],
            'user_id' => [
                'required',
                'integer'],
            'grade' => [
                'required',
                'integer'],

        ];
    }
}