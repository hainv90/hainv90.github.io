<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Repositories\UserRepository;

class UserVerifyValidate implements Rule
{
    private $input;
    private $userId;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($input, $userId)
    {
        $this->input = $input;
        $this->userId = $userId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
            // Nếu chưa có userId thì cho đăng kí(dùng cho đăng kí)
        if(!$this->userId) {
            return !app(UserRepository::class)->verify($this->input['email']);
        }
        // Ktra email của userId, update tránh nhập nhầm email của userId #(phục vụ cho update)
        return !app(UserRepository::class)->notUser($this->input['email'], $this->userId);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email đã được đăng ký.';
    }
}
