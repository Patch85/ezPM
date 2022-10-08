<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'room_number',
        'floor',
        'functional_status',
        'pm_status',
        'slug',
    ];

    /**
     * An array of valid equipment types
     *
     * @var string[]
     */
    public $equipmentTypes = [
        'Air Handler',
        'Fan Coil',
        'VAV',
        'Infrared',
    ];

    /**
     * An array of valid PM statuses.
     *
     * @var string[]
     */
    public $pmStatuses = [
        "To Do",
        "In Progress",
        "Complete",
    ];

    /**
     * An array of statuses that can describe the equipment's condition
     *
     * @var string[]
     */
    public $functionalStatuses = [
        'Fully Functional',
        'Semi-Functional - Requires Maintenance',
        'Not Functional - Requires Maintenance',
        'Not Functional - Requires Installation',
    ];

    /**
     * Get the building that owns the Equipment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
}
