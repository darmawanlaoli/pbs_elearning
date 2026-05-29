<?php

if (!function_exists('subjectComponents')) {

    function subjectComponents()
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | AGAMA
            |--------------------------------------------------------------------------
            */

            'RELIGIOUS EDUCATION' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],



            /*
            |--------------------------------------------------------------------------
            | ICT
            |--------------------------------------------------------------------------
            */

            'INFORMATION AND COMMUNICATION TECHNOLOGY' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],

            'CIVIC' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],

            'MUSIC' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],

            'SCIENCE AND SOCIAL STUDY' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],

            'HEALTH AND PHYSICAL EDUCATION' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'pe_understand_rules',
                    'pe_locomotors_movement',
                ],
            ],

            'ART AND CRAFT' => [

                'CONCEPT' => [
                    'art_followed_direction'
                ],

                'DEMONSTRATE' => [
                    'art_displayed_neat',
                    'art_finished_project',
                ],
            ],

            'ENGLISH' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'lang_writes_with_fluency',
                    'lang_reads_accurately',
                    'lang_listen_with_understanding',
                    'lang_expresses_ideas',
                    'lang_neatness_in_writing'
                ],
            ],

            'BAHASA INDONESIA' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'lang_writes_with_fluency',
                    'lang_reads_accurately',
                    'lang_listen_with_understanding',
                    'lang_expresses_ideas',
                    'lang_neatness_in_writing'
                ],
            ],

            'MATHEMATIC' => [

                'CONCEPT' => [
                    'concept'
                ],

                'DEMONSTRATE' => [
                    'demonstrate'
                ],
            ],

            // MANDARIN

            'MANDARIN' => [

                'CONCEPT' => [
                    'mandarin_understands_vocabulary'
                ],

                'DEMONSTRATE' => [
                    'mandarin_writes_characters',
                    'mandarin_neatness',
                    'mandarin_correct_intonation',
                    'mandarin_reads_fluently',
                    'mandarin_able_to_pronounce',
                    'mandarin_able_to_transfer_the_words',

                ],
            ],

        ];
    }
}



if (!function_exists('calculateComponentScore')) {

    function calculateComponentScore($fields, $row)
    {
        $scores = [];

        foreach ($fields as $field) {

            if (isset($row->$field) && $row->$field !== null) {

                $scores[] = $row->$field;
            }
        }

        return round(
            collect($scores)->avg()
        );
    }
}



if (!function_exists('calculateAverage')) {

    function calculateAverage($term1, $term2)
    {
        return round(
            collect([$term1, $term2])
                ->filter(fn($v) => $v !== null)
                ->avg()
        );
    }
}
