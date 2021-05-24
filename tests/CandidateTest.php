<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Faker\Factory as Faker;
use Illuminate\Http\UploadedFile;

class CandidateTest extends TestCase
{
    const TOKEN = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOiIxIiwiaWF0IjoxNjIxODI0NzI5LCJleHAiOjE2MjE4MjgzMjl9.2WCVP-1jnxqOUbpAWTHuiQDGl2w4eMbfuEyQ8AS1GLQ';
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_candidate_show_by_id()
    {
        $this->get("v1/candidates/1",['Authorization'=>Self::TOKEN])
                ->seeStatusCode(200)
                ->seeJsonStructure(
                    [
                        "id",
                        "first_name",
                        "last_name",
                        "email",
                        "contact_number",
                        "gender",
                        "specialization",
                        "work_ex_year",
                        "candidate_dob",
                        "address",
                        "resume",
                        "created_on",
                        "created_by",
                        "modified_by",
                        "modified_on"
                    ]
                );

    }

    public function test_candidate_search()
    {
        $data = [
                "first_name"=>"abc",
                "last_name"=>"xyz",
                "email"=>"xyz@gmail.com",
                "page"=>"1",
                "limit"=>"1"
        ];
        $this->post("v1/candidates/search",$data,['Authorization'=>Self::TOKEN])
                ->seeStatusCode(200)
                ->seeJsonStructure(
                    [
                        "data"
                    ]
                );

    }

    public function test_candidate_create()
    {
        $data = [
                "first_name"=>"abc",
                "last_name"=>"xyz",
                "email"=>"xy0201@gmail.com",
                "contact_number"=>"9833537452",
                "gender"=>"1",
                "work_ex_year"=>"1",
                "candidate_dob"=>"1988-02-11"
        ];

        $faker = Faker::create();
        $files = [
            'resume' => UploadedFile::fake()->create('SwapnilJadhavResumess.doc', 1024)
        ];

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => Self::TOKEN
        ];
        $servers = [];
        foreach ($headers as $k => $header) {
            $servers["HTTP_" . $k] = $header;
        }
        $response = $this->call('POST', 'v1/candidates', $data,[],$files,$servers);
        //dd($response);
        $this->seeStatusCode(201);
        // $response->assertJsonValidationErrors('email', $responseKey = null);
        // $response->assertJsonValidationErrors('contact_number', $responseKey = null);
        // $response->assertJsonValidationErrors('candidate_dob', $responseKey = null);
        // $response->assertJsonValidationErrors('resume', $responseKey = null);

    }


    public function test_candidate_list()
    {

        $this->get("v1/candidates",['Authorization'=>Self::TOKEN])
                ->seeStatusCode(200)
                ->seeJsonStructure(
                    [
                        "data"
                    ]
                );

    }
}
