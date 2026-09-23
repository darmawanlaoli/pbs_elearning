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

    {{-- B. INDO --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
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

    {{-- DT --}}
    <table class="mt-2" style="font-weight: bold; text-align: center">
        <tr>
            <th>DESIGN AND TECHNOLOGY</th>
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

    {{-- Visual Art --}}
    <table class="mt-5" style="font-weight: bold; text-align: center">
        <tr>
            <th>VISUAL ART</th>
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
            <td>{{ $art->ku_total ?? '' }}</td>
            <td>{{ round($meanArt->mean_ku) }}</td>
            <td>{{ $art->dk_total ?? '' }}</td>
            <td>{{ round($meanArt->mean_dk) }}</td>
        </tr>

        <tr>
            <td rowspan="3">LEARNING BEHAVIOURS</td>
            <td colspan="3">Personal Management Skill</td>
            <td>{{ $art->management_skill ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Active Participation In Learning</td>
            <td>{{ $art->active_participation ?? 0 }}</td>
        </tr>

        <tr>
            <td colspan="3">Social Responsibility</td>
            <td>{{ $art->social_responsibility ?? 0 }}</td>
        </tr>
    </table>

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
