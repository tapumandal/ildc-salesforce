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
        Route::get('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateView')
            ->name('create_training_schedule_view');

        Route::post('training/schedule/create', 'ManagementSetting\TrainingSchedule@trainingScheduleCreateAction')->name('create_training_schedule_action');
        Route::get('schedule/{schedule_id?}/trainee', 'ManagementSetting\ApplicantTrainingManagement@scheduleTraineeView')->name('schedule_trainee_view');
        Route::get('schedule/{schedule_id?}/trainee/{application_no}/remove', 'ManagementSetting\ApplicantTrainingManagement@traineeRemove')->name('trainee_remove_action');
    });
});
