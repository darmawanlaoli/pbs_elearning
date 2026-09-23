{{-- halaman 1 --}}
<div class="page">

    <div
        style=" display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px">

        <div class="logo">
            <img style="margin: auto; display: block; width: 100px"
                src="https://peachblossomsschool.sch.id/images/logo_imyc.webp" alt="">
        </div>

        <div class="judul">
            <h4 class="text-center mt-2 mb-3"><b>STUDENT PROGRESS REPORT CARD <br> PEACHBLOSSOMS
                    HIGH
                    SCHOOL</b>
            </h4>
        </div>

        <div class="logo">
            <img style="margin: auto; display: block; width: 100px"
                src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png"
                alt="">
        </div>

    </div>

    <table style="font-weight: bold; margin-top: 50px; margin-bottom: 50px">

        <tr>
            <td class="subject">STUDENT</td>
            <td>{{ $murid->name }}</td>
        </tr>

        <tr>
            <td>STUDENT NUMBER</td>
            <td>{{ $murid->reg_number }}</td>
        </tr>

        <tr>
            <td>GRADE</td>
            <td>{{ $murid->class }}</td>
        </tr>

        <tr>
            <td>TERM/SEMESTER</td>
            <td>{{ '1 / I' }}</td>
        </tr>

        <tr>
            <td>ACADEMIC YEAR</td>
            <td>{{ '2026 / 2027' }}</td>
        </tr>
    </table>

    {{-- Religious --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">RELIGIOUS EDUCATION</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $religious->ku_total ?? 0 }}</td>
            <td>{{ round($meanReligious->mean_religious_ku) }}</td>
            <td>{{ $religious->dk_total ?? 0 }}</td>
            <td>{{ round($meanReligious->mean_religious_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $religious->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $religious->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $religious->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    {{-- PKN --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">PENDIDIKAN KEWARGANEGARAAN</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $pkn->ku_total ?? '' }}</td>
            <td>{{ round($meanPKn->mean_ku) }}</td>
            <td>{{ $pkn->dk_total ?? '' }}</td>
            <td>{{ round($meanPKn->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $pkn->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $pkn->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $pkn->social_responsibility ?? 0 }}</td>
        </tr>
    </table>


    {{-- B. INDO --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">BAHASA INDONESIA</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $indonesia->lang_total_ku ?? '' }}</td>
            <td>{{ round($meanIndonesia->mean_lang_ku) }}</td>
            <td>{{ $indonesia->lang_total_dk ?? '' }}</td>
            <td>{{ round($meanIndonesia->mean_lang_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $indonesia->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $indonesia->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $indonesia->management_skill ?? 0 }}</td>
        </tr>
    </table>

    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right"></span>
    </div>
</div>


{{-- halaman 2 --}}
<div class="page">

    {{-- IPA --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">ILMU PENGETAHUAN ALAM</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $ipa->ku_total ?? 0 }}</td>
            <td>{{ round($meanIPA->mean_ku) }}</td>
            <td>{{ $ipa->dk_total ?? 0 }}</td>
            <td>{{ round($meanIPA->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $ipa->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $ipa->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $ipa->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    {{-- IPS --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">ILMU PENGETAHUAN SOSIAL</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $ips->ku_total ?? '' }}</td>
            <td>{{ round($meanIPS->mean_ku) }}</td>
            <td>{{ $ips->dk_total ?? '' }}</td>
            <td>{{ round($meanIPS->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $ips->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $ips->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $ips->social_responsibility ?? 0 }}</td>
        </tr>
    </table>


    {{-- Math --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">MATHEMATIC</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <?php
            $mathKu = (($math->ku_total ?? 0) + ($mtk->ku_total ?? 0)) / 2;
            $mathDk = (($math->dk_total ?? 0) + ($mtk->dk_total ?? 0)) / 2;
            ?>

        <tr>
            <td style="padding: 8px">{{ round($mathKu) ?? '' }}</td>
            <td>{{ round($meanMath->mean_ku) }}</td>
            <td>{{ round($mathDk) ?? '' }}</td>
            <td>{{ round($meanMath->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $math->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $math->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $math->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    {{-- English --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">ENGLISH</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $english->lang_total_ku ?? '' }}</td>
            <td>{{ round($meanEnglish->mean_lang_ku) }}</td>
            <td>{{ $english->lang_total_dk ?? '' }}</td>
            <td>{{ round($meanEnglish->mean_lang_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $english->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $english->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $english->management_skill ?? 0 }}</td>
        </tr>
    </table>



    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right"></span>
    </div>
</div>


{{-- halaman 3 --}}
<div class="page">

    {{-- DT --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">DESIGN AND TECHNOLOGY</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $dt->ku_total ?? 0 }}</td>
            <td>{{ round($meanDT->mean_ku) }}</td>
            <td>{{ $dt->dk_total ?? 0 }}</td>
            <td>{{ round($meanDT->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $dt->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $dt->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $dt->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    {{-- Visual Art, Music,  --}}
    @if(str_contains($murid->class, "Y7"))
    {{-- Visual Art --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">VISUAL ART</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $visualArt->ku_total ?? '' }}</td>
            <td>{{ round($meanVisualArt->mean_ku) }}</td>
            <td>{{ $visualArt->dk_total ?? '' }}</td>
            <td>{{ round($meanVisualArt->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $visualArt->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $visualArt->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $visualArt->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    @else

    {{--Music --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">MUSIC</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $music->ku_total ?? '' }}</td>
            <td>{{ round($meanMusic->mean_ku) }}</td>
            <td>{{ $music->dk_total ?? '' }}</td>
            <td>{{ round($meanMusic->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $music->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $music->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $music->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

    @endif

    {{-- PE --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th class="subject">PHYSICAL EDUCATION</th>
            <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
            <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
        </tr>

        <tr>
            <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
            <th>SCORE</th>
            <th>MEAN</th>
            <th>SCORE</th>
            <th>MEAN</th>
        </tr>

        <tr>
            <td style="padding: 8px">{{ $pe->ku_total ?? '' }}</td>
            <td>{{ round($meanPE->mean_ku) }}</td>
            <td>{{ $pe->dk_total ?? '' }}</td>
            <td>{{ round($meanPE->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>
    </table>


    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right"></span>
    </div>
</div>

@if(str_contains($murid->class, "Y7") || str_contains($murid->class, "Y8"))

{{-- halaman 4 --}}
<div class="page">

    {{-- IMYC --}}
    <table class="mt-2" style="font-weight: bold; text-align: center; font-size: 12px">
        <tr>
            <th colspan="6" style="padding: 8px">IMYC ASSESSMENT FOR LEARNING</th>
        </tr>

        <tr>
            <th style="width: 100px" rowspan="2">SUBJECT AND LEARNING GOAL</th>
            <th rowspan="2">STAGE</th>
            <th style="width: 12px" rowspan="2">SCORE</th>
            <th colspan="3">LEARNING BEHAVIOURS</th>
        </tr>

        <tr>
            <th style="width: 15px">Personal Management Skill</th>
            <th style="width: 15px">Active Participation In Learning</th>
            <th style="width: 15px">Social Responsibility</th>
        </tr>

        {{-- Language Arts --}}
        @if($imycLang->imyc_lang != null)
        <?php
            if($imycLang->imyc_lang_total >= 81) {
                $lang_stage = $murid->name . ' ' .$imyc_stage?->mastering_lang_arts;
                $lang_level = 'MASTERING';
            }elseif($imycLang->imyc_lang_total >= 61) {
                $lang_stage = $murid->name . ' ' .$imyc_stage?->developing_lang_arts;
                $lang_level = 'DEVELOPING';
            }else {
                $lang_stage = $murid->name . ' ' .$imyc_stage?->beginning_lang_arts;
                $lang_level = 'BEGINNING';
            }
        ?>
        <tr>
            <th>LANGUAGE ARTS</th>
            <th>{{ $lang_level }}</th>
            <th rowspan="2">{{ $imycLang->imyc_lang_total }}</th>
            <th rowspan="2">{{ $imycLang->imyc_lang_management_skill }}</th>
            <th rowspan="2">{{ $imycLang->imyc_lang_active_participation }}</th>
            <th rowspan="2">{{ $imycLang->imyc_lang_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_lang_arts }}</th>
            <th style="text-align: left">{!! $lang_stage ?? '' !!}</th>
        </tr>
        @endif

        {{-- Science --}}
        @if($imycScience->imyc_science != null)
        <?php
                if($imycScience->imyc_science_total >= 81) {
                    $science_stage = $murid->name . ' ' .$imyc_stage?->mastering_science;
                    $science_level = 'MASTERING';
                }elseif($imycScience->imyc_science_total >= 61) {
                    $science_stage = $murid->name . ' ' .$imyc_stage?->developing_science;
                    $science_level = 'DEVELOPING';
                }else {
                    $science_stage = $murid->name . ' ' .$imyc_stage?->beginning_science;
                    $science_level = 'BEGINNING';
                }
            ?>
        <tr>
            <th>SCIENCE</th>
            <th>{{ $science_level }}</th>
            <th rowspan="2">{{ $imycScience->imyc_science_total }}</th>
            <th rowspan="2">{{ $imycScience->imyc_science_management_skill }}</th>
            <th rowspan="2">{{ $imycScience->imyc_science_active_participation }}</th>
            <th rowspan="2">{{ $imycScience->imyc_science_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_science }}</th>
            <th style="text-align: left">{!! $science_stage ?? '' !!}</th>
        </tr>
        @endif


        {{-- Geo --}}
        @if($imycGeo->imyc_geo != null)
        <?php
            if($imycGeo->imyc_geo_total >= 81) {
                $geo_stage = $murid->name . ' ' .$imyc_stage?->mastering_geo;
                $geo_level = 'MASTERING';
            }elseif($imycGeo->imyc_geo_total >= 61) {
                $geo_stage = $murid->name . ' ' .$imyc_stage?->developing_geo;
                $geo_level = 'DEVELOPING';
            }else {
                $geo_stage = $murid->name . ' ' .$imyc_stage?->beginning_geo;
                $geo_level = 'BEGINNING';
            }
        ?>
        <tr>
            <th>GEOGRAPHY</th>
            <th>{{ $geo_level }}</th>
            <th rowspan="2">{{ $imycGeo->imyc_geo_total }}</th>
            <th rowspan="2">{{ $imycGeo->imyc_geo_management_skill }}</th>
            <th rowspan="2">{{ $imycGeo->imyc_geo_active_participation }}</th>
            <th rowspan="2">{{ $imycGeo->imyc_geo_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_geo }}</th>
            <th style="text-align: left">{!! $geo_stage ?? '' !!}</th>
        </tr>
        @endif

        {{-- HISTORY --}}
        @if($imycHistory->imyc_history ?? '')
        <?php
                if($imycHistory->imyc_history_total >= 81) {
                    $history_stage = $murid->name . ' ' .$imyc_stage?->mastering_history;
                    $history_level = 'MASTERING';
                }elseif($imycHistory->imyc_history_total >= 61) {
                    $history_stage = $murid->name . ' ' .$imyc_stage?->developing_history;
                    $history_level = 'DEVELOPING';
                }else {
                    $history_stage = $murid->name . ' ' .$imyc_stage?->beginning_history;
                    $history_level = 'BEGINNING';
                }
            ?>
        <tr>
            <th>HISTORY</th>
            <th>{{ $history_level }}</th>
            <th rowspan="2">{{ $imycHistory->imyc_history_total }}</th>
            <th rowspan="2">{{ $imycHistory->imyc_history_management_skill }}</th>
            <th rowspan="2">{{ $imycHistory->imyc_history_active_participation }}</th>
            <th rowspan="2">{{ $imycHistory->imyc_history_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_history }}</th>
            <th style="text-align: left">{!! $history_stage ?? '' !!}</th>
        </tr>
        @endif

        {{-- Tech --}}
        @if($imycTech->imyc_tech ?? '')
        <?php
                if($imycTech->imyc_tech_total >= 81) {
                    $tech_stage = $murid->name . ' ' .$imyc_stage?->mastering_tech;
                    $tech_level = 'MASTERING';
                }elseif($imycTech->imyc_tech_total >= 61) {
                    $tech_stage = $murid->name . ' ' .$imyc_stage?->developing_tech;
                    $tech_level = 'DEVELOPING';
                }else {
                    $tech_stage = $murid->name . ' ' .$imyc_stage?->beginning_tech;
                    $tech_level = 'BEGINNING';
                }
            ?>
        <tr>
            <th>TECHNOLOGY</th>
            <th>{{ $tech_level }}</th>
            <th rowspan="2">{{ $imycTech->imyc_tech_total }}</th>
            <th rowspan="2">{{ $imycTech->imyc_tech_management_skill }}</th>
            <th rowspan="2">{{ $imycTech->imyc_tech_active_participation }}</th>
            <th rowspan="2">{{ $imycTech->imyc_tech_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_tech }}</th>
            <th style="text-align: left">{!! $tech_stage ?? '' !!}</th>
        </tr>
        @endif


        {{-- Art --}}
        @if($imycArt->imyc_art != null)
        <?php
                    if($imycArt->imyc_art_total >= 81) {
                        $art_stage = $murid->name . ' ' .$imyc_stage?->mastering_art;
                        $art_level = 'MASTERING';
                    }elseif($imycArt->imyc_art_total >= 61) {
                        $art_stage = $murid->name . ' ' .$imyc_stage?->developing_art;
                        $art_level = 'DEVELOPING';
                    }else {
                        $art_stage = $murid->name . ' ' .$imyc_stage?->beginning_art;
                        $art_level = 'BEGINNING';
                    }
                ?>
        <tr>
            <th>ART</th>
            <th>{{ $art_level }}</th>
            <th rowspan="2">{{ $imycArt->imyc_art_total }}</th>
            <th rowspan="2">{{ $imycArt->imyc_art_management_skill }}</th>
            <th rowspan="2">{{ $imycArt->imyc_art_active_participation }}</th>
            <th rowspan="2">{{ $imycArt->imyc_art_social_responsibility }}</th>
        </tr>
        <tr>
            <th>{{ $imyc_stage?->goal_art }}</th>
            <th style="text-align: left">{!! $art_stage ?? '' !!}</th>
        </tr>
        @endif

    </table>


    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right"></span>
    </div>
</div>

@endif

{{-- halaman 5 --}}
<div class="page">


    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th colspan="2">LEARNING BEHAVIOURS</th>
        </tr>
        <tr>
            <th>Personal Management Skill</th>
            <th>Uses class time effectively; works independently; completes homework and assignments on time</th>
        </tr>
        <tr>
            <th>Active Participation In Learning</th>
            <th>Participates in class activities; self assesses; sets learning goals</th>
        </tr>
        <tr>
            <th>Social Responsibility</th>
            <th>Works well with others; resolves conflicts appropriately; respects self, others and the environment; contributes in a
            positive way to communities</th>
        </tr>

    </table>

    <table class="mt-4" style="font-weight: bold; text-align: center">
        <tr>
            <th colspan="3">SCALE</th>
        </tr>
        <tr>
            <th>A</th>
            <th>Consistently</th>
            <th>Almost all or all of the time</th>
        </tr>
        <tr>
            <th>B</th>
            <th>Usually</th>
            <th>More than half of the time</th>
        </tr>
        <tr>
            <th>C</th>
            <th>Sometimes</th>
            <th>Less than half of the time</th>
        </tr>
        <tr>
            <th>D</th>
            <th>Rarely</th>
            <th>Almost never or never</th>
        </tr>

    </table>

    <div class="row">
        <div class="col-8">
            <table class="mt-4" style="font-weight: bold; text-align: center">
                <tr>
                    <th>EXTRACURRICULAR</th>
                    <th>GRADE LEVEL</th>
                </tr>
                <tr>
                    <th>{{ $reportData->club1 ?? '-' }}</th>
                    <th>{{ $reportData->grade_club1 ?? '-' }}</th>
                </tr>

                <tr>
                    <th>{{ $reportData->club2 ?? '-' }}</th>
                    <th>{{ $reportData->grade_club2 ?? '-' }}</th>
                </tr>

                <tr>
                    <th>{{ $reportData->club3 ?? '-' }}</th>
                    <th>{{ $reportData->grade_club3 ?? '-' }}</th>
                </tr>
            </table>
        </div>

        <div class="col-4">
            <table class="mt-4" style="font-weight: bold; text-align: center">
                <tr>
                    <th>SCALE:</th>
                </tr>
                <tr style="text-align: left">
                    <th>E = Excellent</th>
                </tr>
                <tr style="text-align: left">
                    <th>G = Good</th>
                </tr>
                <tr style="text-align: left">
                    <th>S = Satisfactory</th>
                </tr>
                <tr style="text-align: left">
                    <th>N = Need Improvement</th>
                </tr>
            </table>
        </div>
    </div>

    <table class="mt-4" style="font-weight: bold; text-align: center">
        <tr>
            <th rowspan="2">ATTENDANCE</th>
            <th>PRESENT</th>
            <th>EXCUSED</th>
            <th>UNEXCUSED</th>
            <th>TARDY</th>
        </tr>
        <tr>
            <th style="padding: 10px">{{ $reportData->present ?? '0' }}</th>
            <th>{{ $reportData->excused ?? '0' }}</th>
            <th>{{ $reportData->unexcused ?? '0' }}</th>
            <th>{{ $reportData->tardy ?? '0' }}</th>
        </tr>
    </table>

    <table class="mt-4" style="font-weight: bold; text-align: center">
        <tr>
            <th style="text-align: left">COMMENT</th>
        </tr>

        <tr>
            <th style="text-align: justify; padding: 12px;">
                {{ $reportData->comment ?? 'Comment belum diinput' }}
            </th>
        </tr>
    </table>

    <p class="mt-5 text-center">Acknowledged by :</p>
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th style="width: 25%">DATE ISSUED</th>
            <th style="width: 25%">HOMEROOM <br> TEACHER</th>
            <th style="width: 25%">PRINCIPAL</th>
            <th style="width: 25%">PARENT</th>
        </tr>

        <tr>
            <th style="height: 130px;">25-Sep-2026</th>
            <th style="vertical-align: bottom">{{ session('name') }}</th>
            <th style="vertical-align: bottom">Ancilla Dewi Respati</th>
            <th></th>
        </tr>
    </table>

    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right"></span>
    </div>
</div>
