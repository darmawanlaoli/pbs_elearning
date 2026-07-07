<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminPrimary\HomeController as AdminPrimaryHome;
use App\Http\Controllers\AdminPrimary\LpReportController as LpReport;
use App\Http\Controllers\AdminPrimary\TeacherController as AdminPrimaryTeacher;
use App\Http\Controllers\AdminPrimary\SettingController as AdminPrimarySetting;
use App\Http\Controllers\AdminPrimary\StudentController as AdminPrimaryStudent;
use App\Http\Controllers\AdminPrimary\ZoomController as AdminPrimaryZoom;
use App\Http\Controllers\AdminPrimary\UtsController as AdminPrimaryUts;
use App\Http\Controllers\AdminPrimary\UtsReportController as AdminPrimaryUtsReport;
use App\Http\Controllers\AdminPrimary\AssesmentRecord as PrimaryAssesmentRecordAdmin;
use App\Http\Controllers\AdminPrimary\Report as PrimaryReportAdmin;

use App\Http\Controllers\AdminHs\HomeController as AdminHsHome;

use App\Http\Controllers\AdminHs\StudentController as HsStudentControllerAdmin;
use App\Http\Controllers\AdminPrimary\WeeklyLessonPlan;
use App\Http\Controllers\PrimaryTeacher\HomeController as PrimaryTeacherHome;
use App\Http\Controllers\PrimaryTeacher\LessonPlanController as LessonPlanPrimaryTeacher;
use App\Http\Controllers\PrimaryTeacher\LessonMaterialController as LessonMaterialPrimaryTeacher;
use App\Http\Controllers\PrimaryTeacher\AssesmentRecord as AssesmentRecordPrimaryTeacher;
use App\Http\Controllers\PrimaryTeacher\Report as ReportPrimaryTeacher;
use App\Http\Controllers\PrimaryTeacher\AcademicRecord as PrimaryAcademicRecordAdmin;

use App\Http\Controllers\PrimaryTeacher\UtsController as UtsPrimaryTeacher;
use App\Http\Controllers\HsTeacher\HomeController as HsTeacherHome;
use App\Http\Controllers\HsTeacher\ProjectFormulation as ProjectFormulationHsTeacher;
use App\Http\Controllers\HsTeacher\LessonMaterialController as LessonMaterialHsTeacher;
use App\Http\Controllers\HsTeacher\CtController as CtHsTeacher;


use App\Http\Controllers\HsStudent\HomeController as HsStudentHome;
use App\Http\Controllers\HsStudent\LessonMaterialController as StudentLessonMaterial;
use App\Http\Controllers\HsStudent\ProjectFormulationController as StudentProjectFormulation;
use App\Http\Controllers\HsStudent\CtController as HsStudentCt;

use App\Http\Controllers\PrimaryStudent\HomeController as PrimaryStudentHome;
use App\Http\Controllers\PrimaryStudent\LessonMaterialController as PrimaryStudentLessonMaterial;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('login_action', [LoginController::class, 'login_action'])->name('login_action');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth:primaryadmin', 'role:primaryadmin'])->group(function () {
    Route::get('admin_primary/home', [AdminPrimaryHome::class, 'index'])->name('admin_primary.home');

    Route::get('admin_primary/teacher', [AdminPrimaryTeacher::class, 'index'])->name('admin_primary.teacher');
    Route::get('admin_primary/teacher/create', [AdminPrimaryTeacher::class, 'create'])->name('admin_primary.teacher.create');
    Route::post('admin_primary/teacher/store', [AdminPrimaryTeacher::class, 'store'])->name('admin_primary.teacher.store');
    Route::delete('superadmin/data_cabang/{id}/destroy', [AdminPrimaryTeacher::class, 'destroy'])->name('admin_primary.teacher.destroy');
    Route::get('superadmin/data_cabang/{id}/edit', [AdminPrimaryTeacher::class, 'edit'])->name('admin_primary.teacher.edit');
    Route::post('superadmin/data_cabang/{id}/update', [AdminPrimaryTeacher::class, 'update'])->name('admin_primary.teacher.update');

    Route::get('admin_primary/setting', [AdminPrimarySetting::class, 'index'])->name('admin_primary.setting');

    // lesson plan routes
    Route::get('admin_primary/weekly_lp', [WeeklyLessonPlan::class, 'index'])->name('admin_primary.weekly_lp');
    Route::post('admin_primary/weekly_lp/print', [WeeklyLessonPlan::class, 'print'])->name('admin_primary.weekly_lp.print');

    Route::get('admin_primary/weekly_lp_pic', [WeeklyLessonPlan::class, 'pic'])->name('admin_primary.weekly_lp_pic');


    Route::get('admin_primary/lp_report', [LpReport::class, 'index'])->name('admin_primary.lp_report');
    Route::post('admin_primary/lp_report_print', [LpReport::class, 'print'])->name('admin_primary.lp_report_print');

    // assesment record routes
    Route::get('admin_primary/assesment_record', [PrimaryAssesmentRecordAdmin::class, 'index'])->name('admin_primary.assesment_record');
    Route::get('admin_primary/assesment_record/{id}/detail', [PrimaryAssesmentRecordAdmin::class, 'detail'])->name('admin_primary.assesment_record.detail');
    Route::put('primary_admin/assesment_record/update_all', [PrimaryAssesmentRecordAdmin::class, 'updateAll'])->name('primary_admin.assesment_record.update_all');
    Route::get('admin_primary/assesment_record/excel/{id}', [PrimaryAssesmentRecordAdmin::class, 'export'])->name('admin_primary.assesment_record.excel');

    Route::get('admin_primary/report', [PrimaryReportAdmin::class, 'index'])->name('admin_primary.report');
    Route::get('/students-by-class/{class}', [PrimaryReportAdmin::class, 'getByClass']);
    Route::get('admin_primary/report_approval', [PrimaryReportAdmin::class, 'reportApproval'])->name('admin_primary.report_approval');
    Route::post('admin_primary/report/{id}/approve', [PrimaryReportAdmin::class, 'approveAction'])->name('admin_primary.report.approve');
    Route::post('admin_primary/report/{id}/undo', [PrimaryReportAdmin::class, 'undoAction'])->name('admin_primary.report.undo');
    Route::get('admin_primary/rank', [PrimaryReportAdmin::class, 'rank'])->name('admin_primary.rank');
    Route::post('admin_primary/report/{id}/rank', [PrimaryReportAdmin::class, 'rankDetail'])->name('admin_primary.report.rank');

    // Accumulate
    Route::get('admin_primary/accumulate', [PrimaryReportAdmin::class, 'accumulate'])->name('admin_primary.accumulate');
    Route::post('admin_primary/accumulate/{class}/{semester}/detail', [PrimaryReportAdmin::class, 'accumulateDetail'])->name('admin_primary.accumulate.detail');
    Route::post('admin_primary/accumulate/{class}/{semester}/download', [PrimaryReportAdmin::class, 'downloadExcel'])->name('admin_primary.accumulate.download');

    // uts routes
    Route::get('admin_primary/uts', [AdminPrimaryUts::class, 'index'])->name('admin_primary.uts');
    Route::post('admin_primary/uts/print', [AdminPrimaryUts::class, 'print'])->name('admin_primary.uts.print');
    Route::post('admin_primary/uts/show', [AdminPrimaryUts::class, 'show'])->name('admin_primary.uts.show');

    Route::get('admin_primary/uts_report', [AdminPrimaryUtsReport::class, 'index'])->name('admin_primary.uts_report');
    Route::post('admin_primary/uts_report_print', [AdminPrimaryUtsReport::class, 'print'])->name('admin_primary.uts_report_print');

    Route::get('admin_primary/student', [AdminPrimaryStudent::class, 'index'])->name('admin_primary.student');
    Route::get('admin_primary/student/create', [AdminPrimaryStudent::class, 'create'])->name('admin_primary.student.create');
    Route::post('admin_primary/student/store', [AdminPrimaryStudent::class, 'store'])->name('admin_primary.student.store');
    Route::delete('admin_primary/student/{id}/destroy', [AdminPrimaryStudent::class, 'destroy'])->name('admin_primary.student.destroy');
    Route::get('admin_primary/student/{id}/edit', [AdminPrimaryStudent::class, 'edit'])->name('admin_primary.teacher.edit');
    Route::post('admin_primary/student/{id}/update', [AdminPrimaryStudent::class, 'update'])->name('admin_primary.student.update');

    Route::get('admin_primary/zoom', [AdminPrimaryZoom::class, 'index'])->name('admin_primary.zoom');
    Route::get('admin_primary/zoom/create', [AdminPrimaryZoom::class, 'create'])->name('admin_primary.zoom.create');
    Route::post('admin_primary/zoom/store', [AdminPrimaryZoom::class, 'store'])->name('admin_primary.zoom.store');
    Route::delete('admin_primary/zoom/{id}/destroy', [AdminPrimaryZoom::class, 'destroy'])->name('admin_primary.zoom.destroy');
    Route::get('admin_primary/zoom/{id}/edit', [AdminPrimaryZoom::class, 'edit'])->name('admin_primary.zoom.edit');
    Route::post('admin_primary/zoom/{id}/update', [AdminPrimaryZoom::class, 'update'])->name('admin_primary.zoom.update');


});

Route::middleware(['auth:primaryteacher', 'role:primaryteacher'])->group(function () {
    Route::get('primary_teacher/home', [PrimaryTeacherHome::class, 'index'])->name('primary_teacher.home');
    Route::get('primary_teacher/lesson_plan', [LessonPlanPrimaryTeacher::class, 'index'])->name('primary_teacher.lesson_plan');
    Route::get('primary_teacher/lesson_plan/create', [LessonPlanPrimaryTeacher::class, 'create'])->name('primary_teacher.lesson_plan.create');
    Route::post('primary_teacher/lesson_plan/store', [LessonPlanPrimaryTeacher::class, 'store'])->name('primary_teacher.lesson_plan.store');
    Route::delete('primary_teacher/lesson_plan/{id}/destroy', [LessonPlanPrimaryTeacher::class, 'destroy'])->name('primary_teacher.lesson_plan.destroy');
    Route::get('primary_teacher/lesson_plan/{id}/detail', [LessonPlanPrimaryTeacher::class, 'detail'])->name('primary_teacher.lesson_plan.detail');

    Route::get('primary_teacher/uts', [UtsPrimaryTeacher::class, 'index'])->name('primary_teacher.uts');
    Route::get('primary_teacher/uts/create', [UtsPrimaryTeacher::class, 'create'])->name('primary_teacher.uts.create');
    Route::post('primary_teacher/uts/store', [UtsPrimaryTeacher::class, 'store'])->name('primary_teacher.uts.store');
    Route::delete('primary_teacher/uts/{id}/destroy', [UtsPrimaryTeacher::class, 'destroy'])->name('primary_teacher.uts.destroy');
    Route::get('primary_teacher/uts/{id}/detail', [UtsPrimaryTeacher::class, 'detail'])->name('primary_teacher.uts.detail');

    Route::get('primary_teacher/lesson_material', [LessonMaterialPrimaryTeacher::class, 'index'])->name('primary_teacher.lesson_material');
    Route::get('primary_teacher/lesson_material/create', [LessonMaterialPrimaryTeacher::class, 'create'])->name('primary_teacher.lesson_material.create');
    Route::post('primary_teacher/lesson_material/store', [LessonMaterialPrimaryTeacher::class, 'store'])->name('primary_teacher.lesson_material.store');
    Route::delete('primary_teacher/lesson_material/{id}/destroy', [LessonMaterialPrimaryTeacher::class, 'destroy'])->name('primary_teacher.lesson_material.destroy');
    Route::get('primary_teacher/lesson_material/{id}/detail', [LessonMaterialPrimaryTeacher::class, 'detail'])->name('primary_teacher.lesson_material.detail');

    // assesment record routes
    Route::get('primary_teacher/assesment_record', [AssesmentRecordPrimaryTeacher::class, 'index'])->name('primary_teacher.assesment_record');
    Route::get('primary_teacher/assesment_record/create', [AssesmentRecordPrimaryTeacher::class, 'create'])->name('primary_teacher.assesment_record.create');
    Route::post('primary_teacher/assesment_record/store', [AssesmentRecordPrimaryTeacher::class, 'store'])->name('primary_teacher.assesment_record.store');
    Route::get('primary_teacher/assesment_record/{id}/detail', [AssesmentRecordPrimaryTeacher::class, 'detail'])->name('primary_teacher.assesment_record.detail');
    Route::get('primary_teacher/assesment_record/excel/{class}/{subject}', [AssesmentRecordPrimaryTeacher::class, 'export'])->name('primary_teacher.assesment_record.export');
    Route::post('primary_teacher/assesment_record/import', [AssesmentRecordPrimaryTeacher::class, 'import'])->name('primary_teacher.assesment_record.import');
    Route::post('primary_teacher/assesment_record/import_action', [AssesmentRecordPrimaryTeacher::class, 'importAction'])->name('primary_teacher.assesment_record.import_action');
    Route::put('primary_teacher/assesment_record/update_all', [AssesmentRecordPrimaryTeacher::class, 'updateAll'])->name('primary_teacher.assesment_record.update_all');

    Route::delete('primary_teacher/assesment_record/{id}/destroy', [AssesmentRecordPrimaryTeacher::class, 'destroy'])->name('primary_teacher.assesment_record.destroy');

        // assesment record routes
    Route::get('primary_teacher/report', [ReportPrimaryTeacher::class, 'index'])->name('primary_teacher.report');
    Route::post('primary_teacher/report', [ReportPrimaryTeacher::class, 'index'])->name('primary_teacher.report');

    // assesment record routes
    Route::get('primary_teacher/academic_records', [PrimaryAcademicRecordAdmin::class, 'index'])->name('primary_teacher.academic_records');
    Route::get('primary_teacher/academic_records/{id}/detail', [PrimaryAcademicRecordAdmin::class, 'detail'])->name('primary_teacher.academic_records.detail');


    Route::get('primary_teacher/report_data', [ReportPrimaryTeacher::class, 'reportData'])->name('primary_teacher.report_data');
    Route::get('primary_teacher/report_data/create', [ReportPrimaryTeacher::class, 'create'])->name('primary_teacher.report_data.create');
    Route::post('primary_teacher/report_data/store', [ReportPrimaryTeacher::class, 'store'])->name('primary_teacher.report_data.store');
    Route::get('primary_teacher/report_data/{id}/input', [ReportPrimaryTeacher::class, 'input'])->name('primary_teacher.report_data.input');
    Route::delete('primary_teacher/report_data/{id}/destroy', [ReportPrimaryTeacher::class, 'destroy'])->name('primary_teacher.report_data.destroy');
    Route::put('primary_teacher/report_data/update_all', [ReportPrimaryTeacher::class, 'updateAll'])->name('primary_teacher.report_data.update_all');
});


Route::middleware(['auth:hsteacher', 'role:hsteacher'])->group(function () {
    Route::get('hs_teacher/home', [HsTeacherHome::class, 'index'])->name('hs_teacher.home');
    Route::get('/chat', [HsTeacherHome::class, 'chat'])->name('chat.index');
    Route::post('/chat/kirim', [HsTeacherHome::class, 'storeChat'])->name('chat.kirim');

    Route::get('hs_teacher/project_formulation', [ProjectFormulationHsTeacher::class, 'index'])->name('hs_teacher.project_formulation');
    Route::get('hs_teacher/project_formulation/create', [ProjectFormulationHsTeacher::class, 'create'])->name('hs_teacher.project_formulation.create');
    Route::post('hs_teacher/project_formulation/store', [ProjectFormulationHsTeacher::class, 'store'])->name('hs_teacher.project_formulation.store');
    Route::delete('hs_teacher/project_formulation/{id}/destroy', [ProjectFormulationHsTeacher::class, 'destroy'])->name('hs_teacher.project_formulation.destroy');
    Route::get('hs_teacher/project_formulation/{id}/detail', [ProjectFormulationHsTeacher::class, 'detail'])->name('hs_teacher.project_formulation.detail');

    // routes lesson material - hsteacher
    Route::get('hs_teacher/lesson_material', [LessonMaterialHsTeacher::class, 'index'])->name('hs_teacher.lesson_material');
    Route::get('hs_teacher/lesson_material/create', [LessonMaterialHsTeacher::class, 'create'])->name('hs_teacher.lesson_material.create');
    Route::post('hs_teacher/lesson_material/store', [LessonMaterialHsTeacher::class, 'store'])->name('hs_teacher.lesson_material.store');
    Route::delete('hs_teacher/lesson_material/{id}/destroy', [LessonMaterialHsTeacher::class, 'destroy'])->name('hs_teacher.lesson_material.destroy');
    Route::get('hs_teacher/lesson_material/{id}/detail', [LessonMaterialHsTeacher::class, 'detail'])->name('hs_teacher.lesson_material.detail');

    // routes chaptertest - hsteacher
    Route::get('hs_teacher/ct', [CtHsTeacher::class, 'index'])->name('hs_teacher.ct');
    Route::get('hs_teacher/ct/create', [CtHsTeacher::class, 'create'])->name('hs_teacher.ct.create');
    Route::post('hs_teacher/ct/store', [CtHsTeacher::class, 'store'])->name('hs_teacher.ct.store');
    Route::delete('hs_teacher/ct/{id}/destroy', [CtHsTeacher::class, 'destroy'])->name('hs_teacher.ct.destroy');
    Route::get('hs_teacher/ct/{id}/assign', [CtHsTeacher::class, 'assign'])->name('hs_teacher.ct.assign');
    Route::get('hs_teacher/ct/{id}/responses', [CtHsTeacher::class, 'responses'])->name('hs_teacher.ct.responses');
    Route::post('hs_teacher/ct/assign_action', [CtHsTeacher::class, 'AssignAction'])->name('hs_teacher.ct.assign_action');
});


Route::middleware(['auth:hsadmin', 'role:hsadmin'])->group(function () {
    Route::get('hsadmin/home', [AdminHsHome::class, 'index'])->name('hs_admin.home');

    Route::get('hs_admin/student', [HsStudentControllerAdmin::class, 'index'])->name('hs_admin.student_data');
});

Route::middleware(['auth:hsstudent', 'role:hsstudent'])->group(function () {
    Route::get('hsstudent/home', [HsStudentHome::class, 'index'])->name('hs_student.home');
    Route::post('/chat_student/kirim', [HsStudentHome::class, 'storeChat'])->name('chat_student.kirim');
    Route::post('hs_student/update_password/store', [HsStudentHome::class, 'storeUpdatePassword'])->name('hs_student.update_password.store');

    Route::get('hsstudent/project_formulation', [StudentProjectFormulation::class, 'index'])->name('hsstudent.project_formulation');

    Route::get('hsstudent/lesson_material', [StudentLessonMaterial::class, 'index'])->name('hsstudent.lesson_material');
    Route::get('hsstudent/lesson_material/{id}/show', [StudentLessonMaterial::class, 'show'])->name('hsstudent.lessonmaterial.show');
    Route::get('hsstudent/ct', [HsStudentCt::class, 'index'])->name('hsstudent.ct');
    Route::get('hsstudent/ct/{id}/detail', [HsStudentCt::class, 'detail'])->name('hsstudent.ct.detail');
    Route::post('hsstudent/ct/{id}/upload', [HsStudentCt::class, 'upload'])->name('hsstudent.ct.upload');
});

Route::middleware(['auth:primarystudent', 'role:primarystudent'])->group(function () {
    Route::get('primary_student/home', [PrimaryStudentHome::class, 'index'])->name('primary_student.home');
    Route::post('/chat_student/kirim', [PrimaryStudentHome::class, 'storeChat'])->name('chat_student.kirim');
    Route::post('hs_student/update_password/store', [PrimaryStudentHome::class, 'storeUpdatePassword'])->name('primary_student.update_password.store');

    Route::get('primary_student/assignment', [StudentProjectFormulation::class, 'index'])->name('primary_student.assignment');

    Route::get('primary_student/lesson_material', [PrimaryStudentLessonMaterial::class, 'index'])->name('primary_student.lesson_material');
    Route::get('primary_student/lesson_material/{id}/show', [PrimaryStudentLessonMaterial::class, 'show'])->name('primary_student.lessonmaterial.show');
});
