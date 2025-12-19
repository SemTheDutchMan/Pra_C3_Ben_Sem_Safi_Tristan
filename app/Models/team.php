<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Fixture;
use App\Models\Tournament;
use App\Models\School;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'tournament_id',
        'name',
        'sport',
        'group',
        'teamsort',
        'referee',
        'pool',
        'pool_id',
        'poulePoints',
    ];

    protected $casts = [
        'poulePoints' => 'integer',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class);
    }

    public function fixturesAsTeam1(): HasMany
    {
        return $this->hasMany(Fixture::class, 'team_1_id');
    }

    public function fixturesAsTeam2(): HasMany
    {
        return $this->hasMany(Fixture::class, 'team_2_id');
    }
}
