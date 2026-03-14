<?php
namespace App\Http\Requests\Admin;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreUserRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array { return ['name'=>['required','string','max:255'],'email'=>['required','email',Rule::unique(User::class)],'password'=>['required','string','min:6'],'role'=>['required','in:admin,customer']]; }
}
