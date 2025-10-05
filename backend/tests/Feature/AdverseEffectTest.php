<?php
namespace Tests\Feature;

use App\Models\User;
use App\Models\AdverseEffect;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdverseEffectTest extends TestCase
{
    use RefreshDatabase;

    protected function authenticateUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;
    }

    /** @test */
    public function user_can_view_adverse_effects_list()
    {
        $this->authenticateUser();

        AdverseEffect::factory()->count(3)->create();

        $response = $this->get('/adverse_effects');

        $response->assertStatus(200);
        $response->assertSeeText('Adverse Effects List');
    }

    /** @test */
    public function user_can_create_adverse_effect()
    {
        $this->authenticateUser();

        $data = [
            'vaccination_records_id' => 1,
            'Description' => 'Severe headache after vaccination',
            'Severity' => 'Moderate',
            'reported_by' => 1,
            'ReportedDate' => now()->format('Y-m-d'),
        ];

        $response = $this->post('/adverse_effects', $data);

        $response->assertRedirect('/adverse_effects');
        $this->assertDatabaseHas('adverse_effects', $data);
    }

    /** @test */
    public function user_can_edit_adverse_effect()
    {
        $this->authenticateUser();

        $adverseEffect = AdverseEffect::factory()->create();

        $updatedData = [
            'vaccination_records_id' => $adverseEffect->vaccination_records_id,
            'Description' => 'Updated description',
            'Severity' => 'Severe',
            'reported_by' => $adverseEffect->reported_by,
            'ReportedDate' => $adverseEffect->ReportedDate,
        ];

        $response = $this->put("/adverse_effects/{$adverseEffect->id}", $updatedData);

        $response->assertRedirect('/adverse_effects');
        $this->assertDatabaseHas('adverse_effects', ['Description' => 'Updated description']);
    }

    /** @test */
    public function user_can_delete_adverse_effect()
    {
        $this->authenticateUser();

        $adverseEffect = AdverseEffect::factory()->create();

        $response = $this->delete("/adverse_effects/{$adverseEffect->id}");

        $response->assertRedirect('/adverse_effects');
        $this->assertDatabaseMissing('adverse_effects', ['id' => $adverseEffect->id]);
    }
}
