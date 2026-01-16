<?php

namespace App\Models;

use CodeIgniter\Model;

class ProposalAuditModel extends Model
{
    protected $table = 'proposal_audits';

    protected $allowedFields = [
        'proposal_id',
        'actor',
        'event',
        'payload',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = false;
}
