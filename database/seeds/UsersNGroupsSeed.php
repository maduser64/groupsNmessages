<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;

class UsersNGroupsSeed extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		DB::table('groups')->delete();

		$adam = User::create([
			'name' => 'adam',
			'email' => 'adam@adam.com',
			'password' => Hash::make('123456'),
		]);

		$lolo = User::create([
			'name' => 'lolo',
			'email' => 'lolo@lolo.com',
			'password' => Hash::make('123456'),
		]);

		$koko = User::create([
			'name' => 'koko',
			'email' => 'koko@koko.com',
			'password' => Hash::make('123456'),
		]);

		$soso = User::create([
			'name' => 'soso',
			'email' => 'soso@soso.com',
			'password' => Hash::make('123456'),
		]);

		$osc = Group::create([
			'name' => 'OSC',
		]);

		$support = Group::create([
			'name' => 'Support',
		]);

		$osc->users()->attach([$adam->id, $koko->id, $lolo->id]);
		$support->users()->attach([$soso->id, $adam->id]);
	}
}
