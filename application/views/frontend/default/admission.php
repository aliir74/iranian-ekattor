<div class="admission-area page-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="admission-form-wrapper" id="form-print">
                   <div class="row">
                       <div class="col">
                           <div class="form-head clearfix">
                                <div class="school-info pull-left w-50">
                                    <h2><?php echo $school_title; ?></h2>
                                    <p><?php echo $this->frontend_model->get_frontend_general_settings('address'); ?></p>
                                    <p><?php echo $this->frontend_model->get_frontend_general_settings('phone'); ?></p>
                                    <h3 class=""><?php echo get_phrase('admission_form'); ?></h3>
                                </div>
                               <div class="student-img-wrapper text-center pull-left w-50">
                                   <div class="student-img">
                                       <p><?php echo get_phrase('student_photo'); ?></p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col">
                           <div class="form-body">
                                <div class="block-title text-center">
                                    <h4><?php echo get_phrase('student_information'); ?></h4>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title"><?php echo get_phrase('student_name'); ?> :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row"> <div class="input-title"><?php echo get_phrase('home_address'); ?> :</div> <div class="form-field"></div> </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title"><?php echo get_phrase('gender'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title"><?php echo get_phrase('birthday'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title"><?php echo get_phrase('father_name'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title"><?php echo get_phrase('mobile_num'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title"><?php echo get_phrase('mother_name'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title"><?php echo get_phrase('mobile_num'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row">
                                    <div class="clearfix w-50 pull-left p-r-10">
                                        <div class="input-title"><?php echo get_phrase('religion'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                    <div class="clearfix w-50  pull-left">
                                        <div class="input-title"><?php echo get_phrase('nationality'); ?> :</div> <div class="form-field"></div>
                                    </div>
                                </div>
                                <div class="clearfix s-row"> <div class="input-title"><?php echo get_phrase('educational_background'); ?> :</div> <div class="form-field"></div> </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="print-btn text-center">
                    <button type="button" class="btn btn-dark" onclick="printDiv('form-print')"><?php echo get_phrase('print'); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
