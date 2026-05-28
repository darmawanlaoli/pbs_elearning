<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PrimaryReportDataDetails extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_report',
        'name',
        'concept',
        'demonstrate',
        'pe_understand_rules',
        'pe_locomotors_movement',
        'art_followed_direction',
        'art_displayed_neat',
        'art_finished_project',
        'lang_neatness_in_writing',
        'lang_writes_with_fluency',
        'lang_reads_accurately',
        'lang_expresses_ideas',
        'mandarin_understands_vocabulary',
        'mandarin_writes_characters',
        'mandarin_neatness',
        'mandarin_correct_intonation',
        'mandarin_reads_fluently',
        'mandarin_able_to_pronounce',
        'is_able_to_transfer_the_words_listened_into_written_form',
        'mandarin_able_to_transfer_the_words',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
