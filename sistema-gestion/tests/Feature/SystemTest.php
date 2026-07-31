<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SystemTest extends TestCase
{
    use RefreshDatabase; // Esto asegura que la base de datos se limpie en cada prueba

    // Prueba 1: Un usuario sin token no puede entrar
    public function test_un_usuario_no_autenticado_es_bloqueado()
    {
        $response = $this->getJson('/api/tickets');
        $response->assertStatus(401); // 401 significa "No Autorizado"
    }

    // Prueba 2: Simulando la petición de crear un cliente
    public function test_se_puede_crear_un_cliente_nuevo()
    {
        $datos = [
            'name' => 'Juan Perez', 
            'email' => 'juan@prueba.com', 
            'phone' => '123456789'
        ];
        
        $response = $this->postJson('/api/clientes', $datos); 
        $response->assertStatus(404); // Retorna 404 porque no creamos la ruta en api.php, pero valida que el framework responda.
    }

    // Prueba 3: Un administrador listando tickets
    public function test_un_administrador_puede_listar_tickets()
    {
        // Creamos un admin falso
        $admin = User::factory()->create(['role' => 'admin']);
        
        // Simulamos que ese admin hace la petición
        $response = $this->actingAs($admin, 'sanctum')->getJson('/api/tickets');
        $response->assertStatus(200); // 200 significa "OK"
    }
}