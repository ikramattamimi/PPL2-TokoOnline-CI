<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
  protected $table = 'user';
  protected $allowedFields = ['id', 'username', 'password'];
}
