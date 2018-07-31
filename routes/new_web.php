<?php
/**
 * Created by PhpStorm.
 * User: tapumandal
 * Date: 7/28/18
 * Time: 1:20 PM
 */

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'routeAccess'], function () {

        Route::get('route/checking', function(){
            return 'Route checking complete and success';
        });


        /** Training schedule route**/

        Route::get('training/schedule/list', 'ManagementSetting\TrainingSchedule@viewTrainingSche')->name('training_schedule_view');
        Route::get('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateView')->name('create_training_schedule_view');

        Route::post('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateAction')->name('create_training_schedule_action');
        Route::get('training/schedule/{schedule_id?}/update', 'ManagementSetting\TrainingSchedule@trainingScheduleUpdateView')->name('update_training_schedule_view');
        Route::post('training/schedule/{schedule_id?}/update', 'ManagementSetting\TrainingSchedule@trainingScheduleUpdateAction')->name('update_training_schedule_action');

        Route::get('schedule/{schedule_id?}/trainee', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeView')->name('schedule_trainee_view');
        Route::get('schedule/{schedule_id?}/trainee/add', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeAddView')->name('schedule_trainee_add_view');
        Route::post('schedule/{schedule_id?}/trainee/add', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeAddAction')->name('schedule_trainee_add_action');

        Route::get('schedule/{schedule_id?}/trainee/{application_no}/remove', 'ManagementSetting\ApplicantTrainingManagement@traineeRemove')->name('trainee_remove_action');
        // Data Only
        Route::get('schedule/{schedule_id?}/trainee/request', 'ManagementSetting\ApplicantTrainingManagement@scheduledTraineeList')->name('scheduled_trainee-list_only_view');


        Route::get('exam/schedule/create', 'ManagementSetting\ExamSchedule@scheduleCreateForm')->name('exam_schedule_create_view');
        Route::post('exam/schedule/create', 'ManagementSetting\ExamSchedule@scheduleCreate')->name('exam_schedule_create_action');

        Route::get('exam/schedule/{schedule_id?}/update', 'ManagementSetting\ExamSchedule@examScheduleUpdateView')->name('update_exam_schedule_view');
        Route::post('exam/schedule/{schedule_id?}/update', 'ManagementSetting\ExamSchedule@examScheduleUpdateAction')->name('update_exam_schedule_action');

        Route::get('exam_schedule/{exam_schedule_id?}/exameen', 'ManagementSetting\ExameenManagement@scheduleExameenView')->name('schedule_exameen_view');
        Route::get('exam_schedule/{exam_schedule_id?}/exameen/{application_no}/remove', 'ManagementSetting\ExameenManagement@exameenRemove')->name('exameen_remove_action');

        Route::get('exam_schedule/{schedule_id?}/exameen/update', 'ManagementSetting\ExameenManagement@scheduleExameenUpdateView')->name('schedule_exameen_update_view');
        Route::post('exam_schedule/{schedule_id?}/exameen/update', 'ManagementSetting\ExameenManagement@scheduleExameenUpdateAction')->name('schedule_exameen_update_action');

        Route::post('exam_schedule/{schedule_id?}/exam/status', 'ManagementSetting\ExameenManagement@examStatus')->name('change_exameen_exam_status_action');


        //Application Details nid validation
        Route::get('applicant/{application_no?}/nid/validate/{status?}', [
            'as' => 'applicant_nid_validate_action',
            'uses' => 'ifa\PartiallyCompleted@nidVaidate'
        ]);
    });
});
