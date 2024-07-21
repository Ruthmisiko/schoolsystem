<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();

        return response()->json([
            'success' => true,
            'data' => $teachers,
            'message' => 'Teachers retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, Teacher::$rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $teacher = Teacher::create($input);

        return $this->sendResponse($teacher->toArray(), 'Teacher created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        if (is_null($teacher)) {
            return $this->sendError('Teacher not found.');
        }

        return $this->sendResponse($teacher->toArray(), 'Teacher retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        if (is_null($teacher)) {
            return $this->sendError('Teacher not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, Teacher::$rules);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $teacher->update($input);

        return $this->sendResponse($teacher->toArray(), 'Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        if (is_null($teacher)) {
            return $this->sendError('Teacher not found.');
        }

        $teacher->delete();

        return $this->sendResponse([], 'Teacher deleted successfully');
    }

    /**
     * Send a JSON response.
     *
     * @param  array  $result
     * @param  string $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }
}
