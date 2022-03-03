<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Patient;

class PatientTest extends TestCase
{
    
    use RefreshDatabase;
    
     /** @test */
    public function a_patient_can_be_created()
    {
        
       $this->withoutExceptionHandling();        
        
        $this->post('create_patient',[
           "name" => "Test Patient",
           "DOB" =>"10/12/1998",
           "gender" => 'male',
           "Geolocation" => 'Test Land',
           "Phone" => "0720344918",
           "ID_Number" => "123456",
           "CCC_Number" => "admin-12345",
           "Nemis" => '2345678',
           "Link_facility" => '1',
           "Resident" => 'Test Resident',
           "Date_of_Transfer" =>  "1/12/1998"
        ]);
        
        $patient = Patient::all();
        
        $this->assertCount(1,$patient);
        
    }
    
     /** @test */
    public function a_patient_can_be_updated()
    {
        $this->withoutExceptionHandling();
        
        $this->post('create_patient',[
            "name" => "Test Patient",
            "DOB" =>"10/12/1998",
            "gender" => 'male',
            "Geolocation" => 'Test Land',
            "Phone" => "0720344918",
            "ID_Number" => "123456",
            "CCC_Number" => "admin-12345",
            "Nemis" => '2345678',
            "Link_facility" => '1',
            "Resident" => 'Test Resident',
            "Date_of_Transfer" =>  "1/12/1998"
         ]);

        $patient_all = Patient::first();

        $patient = $this->patch('patient/'.Patient::first()->id, [
            "name" => "Test patch",
            "DOB" =>"10/12/1998",
            "gender" => 'male',
            "Geolocation" => 'Patch Test Land',
            "Phone" => "0720344918",
            "ID_Number" => "123456",
            "CCC_Number" => "admin-12345",
            "Nemis" => '2345678',
            "Link_facility" => '1',
            "Resident" => 'Patch Test Resident',
            "Date_of_Transfer" =>  "1/12/1998"
        ]);

        $this->assertEquals('Test patch', Patient::first()->name);
        // $this->assertEquals('Patch Test Land', Patient::first()->Geolocation);
        // $this->assertEquals('Patch Test Resident', Patient::first()->Resident);

        // $response->assertRedirect($author->fresh()->path());
    }
    
    
     /** @test */
    public function a_duplicate_patient_can_be_merged()
    {
        $this->withoutExceptionHandling();
        
        $data = $this->post('create_patient',[
            "name" => "Test Patient",
            "DOB" =>"10/12/1998",
            "gender" => 'male',
            "Geolocation" => 'Test Land',
            "Phone" => "0720344918",
            "ID_Number" => "123456",
            "CCC_Number" => "admin-12345",
            "Nemis" => '2345678',
            "Link_facility" => '1',
            "Resident" => 'Test Resident',
            "Date_of_Transfer" =>  "1/12/1998"
         ]);  
         
         $data = $this->post('create_patient',[
            "name" => "Test Patient 2",
            "DOB" =>"1/12/1998",
            "gender" => 'male',
            "Geolocation" => 'Test Land 2',
            "Phone" => "0720344918",
            "ID_Number" => "123456",
            "CCC_Number" => "admin-12345",
            "Nemis" => '2345678',
            "Link_facility" => '1',
            "Resident" => 'Test Resident 2',
            "Date_of_Transfer" =>  "1/12/1998"
         ]); 
        
        $patient = $this->get('merger_patient/'.Patient::first()->id . '/' . Patient::first()->ID_Number);
        
        $response->assertStatus(200);

        // $this->assertEquals('Test patch', Patient::first()->name);
        // $this->get('merge_duplicate/'.$data[0]->ID_Number);
    }
}

