<?php
namespace App\Repositories;
use App\Models\User;
class UserRepository
{
	protected $userModel;

	public function __construct()
	{
		$this->userModel = new User;
	}

	public function save(array $input, int $id = null)
	{
		return User::updateOrCreate(
			[
				'id' => $id
			],
			[
				'name'     => $input['name'],
				'email'    => $input['email'],
				'phone'    => $input['phone'],
				'password' => isset($input['password']) ? encrypt($input['password']) : null,
				'gender'   => $input['gender'],
				'address'   => $input['address'] ?? null,
			]
		);
	}
	public function verify($email)
	{
		return User::where('email', $email)->whereNotNull('email_verified_at')->exists();
	}
	public function notUser($email, $userId = null)
	{
		return User::where('id', '!=', $userId)->where(['email' => $email])->exists();
	}

	public function findByEmail($email)
	{
		return User::where(['email' => $email])->first();
	}

	public function find($id)
	{
		return User::find($id);
	}
	public function getAll($limit = 15)
	{
		return User::paginate($limit);
	}

	public function destroy(array $ids)
	{
		return User::destroy($ids);
	}

}