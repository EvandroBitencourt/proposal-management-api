<?php

namespace App\Services;

use App\Models\ProposalAuditModel;

class ProposalAuditService
{
    public static function log(
        int $proposalId,
        string $event,
        array $payload = [],
        string $actor = 'system'
    ): void {
        $model = new ProposalAuditModel();

        $model->insert([
            'proposal_id' => $proposalId,
            'event'       => $event,
            'actor'       => $actor,
            'payload'     => json_encode($payload),
        ]);
    }
}
