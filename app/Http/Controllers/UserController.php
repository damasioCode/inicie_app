<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;


class UserController extends Controller
{

    /**
     * Return all users from GoRest API.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function getAllUsers(Request $request) {
        $client = new Client();

        $page = $request->page ?? 1;

        $per_page = $request->per_page ?? 20;

        $users_url = "https://gorest.co.in/public/v2/users";

        $response = $client->request(
            "GET", 
            "{$users_url}?page={$page}&per_page={$per_page}"
        );
        
        // Get return from API body
        $body = $response->getBody();
        
        $users = json_decode($body);

        return response()->json($users);
    }

    /**
     * Get User from GoRest API by ID.
     * @param int $id The ID of the user to fetch.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the user data.
    */
    public function getUser($id) {
        $client = new Client();

        $users_url = "https://gorest.co.in/public/v2/users/{$id}";

        $response = $client->request(
            "GET",
            "{$users_url}"
        );

        // Get return from API body
        $body = $response->getBody();

        $user = json_decode($body);

        return response()->json($user);
    }


    /**
     * Create a new user in GoRest API.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
    */
    public function createUser(Request $request) {
        $client = new Client();

        $users_url = "https://gorest.co.in/public/v2/users";

        $headers = [
            "Authorization" => "Bearer ". env('API_TOKEN')
        ];

        $json = $request->json()->all();

        $response = $client->request(
            "POST", 
            "{$users_url}", [
            "headers" => $headers,
            "json" => $json
        ]);

        // Get return from API body
        $body = $response->getBody();

        $user = json_decode($body);

        return response()->json($user);
    }

    /**
     * Create new posts in Gorest API using ID of user.
     * @param \Illuminate\Http\Request $request.
     * @param int $id The ID of the user to create the post for.
     * @return \Illuminate\Http\JsonResponse The response object containing the created post.
    */
    public function createPost(Request $request, $id) {
        $client = new Client();

        $posts_url = "https://gorest.co.in/public/v2/users/{$id}/posts";

        $headers = [
            "Authorization" => "Bearer ". env('API_TOKEN')
        ];

        $json = $request->json()->all();

        $response = $client->request(
            "POST", 
            "{$posts_url}", [
            "headers" => $headers,
            "json" => $json 
        ]);

        // Get return from API body
        $body = $response->getBody();

        $user = json_decode($body);

        return response()->json($user);
    }
    

    /**
     * Create new comment in post of GoRest API.
     * @param \Illuminate\Http\Request $request.
     * @param int $post_id The ID of the posts to create the a comment.
     * @return \Illuminate\Http\JsonResponse The response object containing the created post.
    */
    public function createComment(Request $request, $post_id) {
        $client = new Client();

        $comments_url = "https://gorest.co.in/public/v2/posts/{$post_id}/comments";

        $headers = [
            "Authorization" => "Bearer ". env('API_TOKEN')
        ];

        $json = $request->json()->all();

        $response = $client->request(
            "POST", 
            "{$comments_url}", [
            "headers" => $headers,
            "json" => $json 
        ]);

        // Get return from API body
        $body = $response->getBody();

        $user = json_decode($body);

        return response()->json($user);
    }


    /**
     * Delete comment in post of GoRest API.
     * @param \Illuminate\Http\Request $request.
     * @param int $comment_id The ID of the posts to delete the a comment.
     * @return \Illuminate\Http\JsonResponse The response object containing the created post.
    */
    public function deleteComment(Request $request, $comment_id) {
        $client = new Client();

        $comments_url = "https://gorest.co.in/public/v2/comments/{$comment_id}";

        $headers = [
            "Authorization" => "Bearer ". env('API_TOKEN')
        ];

        $json = $request->json()->all();

        $response = $client->request(
            "DELETE", 
            "{$comments_url}", [
            "headers" => $headers,
            "json" => $json 
        ]);

        // Get return from API body
        $body = $response->getBody();

        $user = json_decode($body);

        return response()->json($user);
    }
}
