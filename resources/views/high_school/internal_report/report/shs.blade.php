{{-- halaman 1 --}}
<div class="page">

    <div style=" display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px">

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
                src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">
        </div>

    </div>

    <table style="font-weight: bold; margin-top: 50px; margin-bottom: 50px">

        <tr>
            <td>STUDENT</td>
            <td>{{ $murid->name }}</td>
        </tr>

        <tr>
            <td>STUDENT NUMBER</td>
            <td>{{ $murid->reg_number }}</td>
        </tr>

        <tr>
            <td>GRADE/HOMEROOM TEACHER</td>
            <td>{{ $murid->class . '/'.session('name') }}</td>
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
            <th>RELIGIOUS EDUCATION</th>
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
            <th style="padding: 8px">PENDIDIKAN KEWARGANEGARAAN</th>
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
            <th>BAHASA INDONESIA</th>
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
        <span class="right">Page 1</span>
    </div>
</div>


{{-- halaman 2 --}}
<div class="page">


    {{-- FISIKA --}}
    @if($fisika->ku_total != null)
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th>FISIKA</th>
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
            <td style="padding: 8px">{{ $fisika->ku_total ?? 0 }}</td>
            <td>{{ round($meanFisika->mean_ku) }}</td>
            <td>{{ $fisika->dk_total ?? 0 }}</td>
            <td>{{ round($meanFisika->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $fisika->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $fisika->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $fisika->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

    {{-- KIMIA --}}
    @if($kimia->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>KIMIA</th>
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
            <td style="padding: 8px">{{ $kimia->ku_total ?? 0 }}</td>
            <td>{{ round($meanKimia->mean_ku) }}</td>
            <td>{{ $kimia->dk_total ?? 0 }}</td>
            <td>{{ round($meanKimia->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $kimia->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $kimia->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $kimia->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

    {{-- BIOLOGI --}}
    @if($biologi->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>BIOLOGI</th>
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
            <td style="padding: 8px">{{ $biologi->ku_total ?? 0 }}</td>
            <td>{{ round($meanBiologi->mean_ku) }}</td>
            <td>{{ $biologi->dk_total ?? 0 }}</td>
            <td>{{ round($meanBiologi->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $biologi->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $biologi->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $biologi->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

    {{-- EKONOMI --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>EKONOMI</th>
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
            <td class="nilai">{{ $ekonomi->ku_total ?? '' }}</td>
            <td>{{ round($meanEkonomi->mean_ku) }}</td>
            <td>{{ $ekonomi->dk_total ?? '' }}</td>
            <td>{{ round($meanEkonomi->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $ekonomi->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $ekonomi->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $ekonomi->social_responsibility ?? 0 }}</td>
        </tr>
    </table>



    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right">Page 2</span>
    </div>
</div>


{{-- halaman 3 --}}
<div class="page">

    {{-- SOSIOLOGI --}}
    @if($fisika->ku_total != null)
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th>SOSIOLOGI</th>
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
            <td style="padding: 8px">{{ $sosiologi->ku_total ?? 0 }}</td>
            <td>{{ round($meanSosiologi->mean_ku) }}</td>
            <td>{{ $sosiologi->dk_total ?? 0 }}</td>
            <td>{{ round($meanSosiologi->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $sosiologi->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $sosiologi->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $sosiologi->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif


    {{-- GEOGRAFI --}}
    @if($fisika->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>GEOGRAFI</th>
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
            <td style="padding: 8px">{{ $geografi->ku_total ?? 0 }}</td>
            <td>{{ round($meanSosiologi->mean_ku) }}</td>
            <td>{{ $geografi->dk_total ?? 0 }}</td>
            <td>{{ round($meanSosiologi->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $geografi->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $geografi->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $geografi->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif


    {{-- SEJARAH --}}
    @if($fisika->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>SEJARAH</th>
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
            <td style="padding: 8px">{{ $sejarah->ku_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_ku) }}</td>
            <td>{{ $sejarah->dk_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $sejarah->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $sejarah->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $sejarah->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif


    {{-- MATEMATIKA --}}
    @if($fisika->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>MATHEMATIC</th>
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
            <td>{{ $math->dk_total ?? '' }}</td>
            <td>{{ round($meanMath->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $sejarah->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $sejarah->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $sejarah->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

</div>

<div class="page">

    {{-- ENGLISH --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th>ENGLISH</th>
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
            <td>{{ $english->lang_total_ku ?? '' }}</td>
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

    {{-- DM --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>DIGITAL MARKETING</th>
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
            <td>{{ $dm->ku_total ?? 0 }}</td>
            <td>{{ round($meanDM->mean_ku) }}</td>
            <td>{{ $dm->dk_total ?? 0 }}</td>
            <td>{{ round($meanDM->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $dm->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $dm->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $dm->social_responsibility ?? 0 }}</td>
        </tr>
    </table>


    {{-- ART --}}
    @if($fisika->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>ART</th>
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
            <td style="padding: 8px">{{ $sejarah->ku_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_ku) }}</td>
            <td>{{ $sejarah->dk_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $sejarah->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $sejarah->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $sejarah->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

    {{-- PERFORMING ARTS --}}
    @if($fisika->ku_total != null)
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>PERFORMING ARTS</th>
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
            <td style="padding: 8px">{{ $sejarah->ku_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_ku) }}</td>
            <td>{{ $sejarah->dk_total ?? 0 }}</td>
            <td>{{ round($meanSejarah->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $sejarah->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $sejarah->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $sejarah->social_responsibility ?? 0 }}</td>
        </tr>
    </table>
    @endif

    {{-- PE --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>PHYSICAL EDUCATION</th>
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
            <td>{{ $dt->ku_total ?? 0 }}</td>
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

</div>

<div class="page">

    {{-- JEPANG --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th>JAPANESE</th>
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
            <td>{{ $pe->ku_total ?? '' }}</td>
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

    {{-- UOI --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th colspan="6" style="padding: 10px">INQUIRY LEARNING</th>
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

        <tr>
            <th style="padding: 30px">ILMU PENGETAHUAN SOSIAL</th>
           <?php
                if($uoi->uoi_ips >= 81) {
                    $entrepreneur_ku_level = 'MASTERING';
                }elseif($uoi->uoi_ips >= 61) {
                    $entrepreneur_ku_level = 'DEVELOPING';
                }else {
                    $entrepreneur_ku_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_ku_level }}</th>
            <td>{{ $uoi->uoi_ips ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>
        <tr>
            <th style="padding: 30px">ILMU PENGETAHUAN ALAM</th>
            <?php
                if($uoi->uoi_ipa >= 81) {
                    $entrepreneur_ku_level = 'MASTERING';
                }elseif($uoi->uoi_ipa >= 61) {
                    $entrepreneur_ku_level = 'DEVELOPING';
                }else {
                    $entrepreneur_ku_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_ku_level }}</th>
            <td>{{ $uoi->uoi_ipa ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>

    </table>


    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right">Page 2</span>
    </div>
</div>


<div class="page">

    {{-- ENTREPRE --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th colspan="6" style="padding: 10px">ENTREPRENEURSHIP ASSESSMENT FOR LEARNING</th>
        </tr>

        <tr>
            <th style="width: 150px" rowspan="2">CRITERIA</th>
            <th rowspan="2">STAGE</th>
            <th style="width: 12px" rowspan="2">SCORE</th>
            <th colspan="3">LEARNING BEHAVIOURS</th>
        </tr>

        <tr>
            <th style="width: 15px">Personal Management Skill</th>
            <th style="width: 15px">Active Participation In Learning</th>
            <th style="width: 15px">Social Responsibility</th>
        </tr>

        <tr>
            <th style="padding: 10px">Knowledge and Understanding (Subject-specific content acquired in each grade (knowledge), and the comprehension of its
            meaning and significance (understanding)).</th>
            <?php
                if($entrepreneurship->entrepreneur_ku >= 81) {
                    $entrepreneur_ku_level = 'MASTERING';
                }elseif($entrepreneurship->entrepreneur_ku >= 61) {
                    $entrepreneur_ku_level = 'DEVELOPING';
                }else {
                    $entrepreneur_ku_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_ku_level }}</th>
            <td>{{ $entrepreneurship->entrepreneur_ku ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>

        <tr>
            <th style="padding: 10px">Thinking
            (The use of critical and creative thinking skills and/or processes).</th>
            <?php
                if($entrepreneurship->entrepreneur_thinking >= 81) {
                    $entrepreneur_thinking_level = 'MASTERING';
                }elseif($entrepreneurship->entrepreneur_thinking >= 61) {
                    $entrepreneur_thinking_level = 'DEVELOPING';
                }else {
                    $entrepreneur_thinking_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_thinking_level }}</th>
            <td>{{ $entrepreneurship->entrepreneur_thinking ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>

        <tr>
            <th style="padding: 10px">Communication
            (The conveying of meaning through various forms).</th>
            <?php
                if($entrepreneurship->entrepreneur_communication >= 81) {
                    $entrepreneur_communication_level = 'MASTERING';
                }elseif($entrepreneurship->entrepreneur_communication >= 61) {
                    $entrepreneur_communication_level = 'DEVELOPING';
                }else {
                    $entrepreneur_communication_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_communication_level }}</th>
            <td>{{ $entrepreneurship->entrepreneur_communication ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>

        <tr>
            <th style="padding: 10px">Application
            (The use of knowledge and skills to make connections within and between various contexts).</th>
            <?php
                if($entrepreneurship->entrepreneur_application >= 81) {
                    $entrepreneur_application_level = 'MASTERING';
                }elseif($entrepreneurship->entrepreneur_application >= 61) {
                    $entrepreneur_application_level = 'DEVELOPING';
                }else {
                    $entrepreneur_application_level = 'BEGINNING';
                }
            ?>
            <th>{{ $entrepreneur_application_level }}</th>
            <td>{{ $entrepreneurship->entrepreneur_application ?? 0 }}</td>
            <td>{{ $pe->management_skill ?? 0 }}</td>
            <td>{{ $pe->active_participation ?? 0 }}</td>
            <td>{{ $pe->social_responsibility ?? 0 }}</td>
        </tr>

    </table>


    <div class="footer">
        <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
        <span class="right">Page 2</span>
    </div>
</div>


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
            <th>Works well with others; resolves conflicts appropriately; respects self, others and the environment;
                contributes in a
                positive way to communities</th>
        </tr>

    </table>

    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th colspan="2">SCALE</th>
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
            <table class="mt-2" style="font-weight: bold; text-align: center">
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
            <table class="mt-3" style="font-weight: bold; text-align: center">
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

    <table class="mt-3" style="font-weight: bold; text-align: center">
        <tr>
            <th rowspan="2">ATTENDANCE</th>
            <th>PRESENT</th>
            <th>EXCUSED</th>
            <th>UNEXCUSED</th>
            <th>TARDY</th>
        </tr>
        <tr>
            <th>{{ $reportData->present ?? '0' }}</th>
            <th>{{ $reportData->excused ?? '0' }}</th>
            <th>{{ $reportData->unexcused ?? '0' }}</th>
            <th>{{ $reportData->tardy ?? '0' }}</th>
        </tr>
    </table>

    <table class="mt-3" style="font-weight: bold; text-align: center">
        <tr>
            <th style="text-align: left">COMMENT</th>
        </tr>

        <tr>
            <th style="text-align: justify">
                @if($reportData->comment == null)
                {{ 'Comment belum diinput' }}
                @else
                {{ $reportData->comment }}
                @endif
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
        <span class="right">Page 5</span>
    </div>
</div>
