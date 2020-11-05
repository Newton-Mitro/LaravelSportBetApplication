
<?php $__env->startSection('title', 'Page Title'); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $setting = \App\Setting::find(1);
    ?>
    <section>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#demo" data-slide-to="<?php echo e($slider->id); ?>" class="<?php echo e(($key==0)?'active':''); ?>"></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="carousel-inner">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e(($key==0)?'active':''); ?>">
                        <img src="<?php echo e($slider->image); ?>" alt="..." width="100%" height="250px">
                        <div class="carousel-caption d-none d-md-block btb">
                            <?php if($slider->title !=null): ?>
                                <h5><?php echo e($slider->title); ?></h5>
                            <?php endif; ?>
                            <?php if($slider->subtitle !=null): ?>
                                <p><?php echo e($slider->subtitle); ?></p>
                            <?php endif; ?>
                            <?php if($slider->description !=null): ?>
                                <p><?php echo e($slider->description); ?></p>
                            <?php endif; ?>
                            <?php if($slider->button_link !=null): ?>
                                <a href="<?php echo e(url('/')); ?>/<?php echo e($slider->button_link); ?>"
                                   class="btn btn-sm btn-danger"><?php echo e($slider->button_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <div class="scroll-left bs bg-heading">
            <p class=""><?php echo e($setting->headline); ?></p>
        </div>

        <div class="card mt-3">
            <div class=" row customer-logos slider p-3" style="height: 100px">
                <div class="slide text-center">
                    <a href="<?php echo e(route('index')); ?>"
                       class="text-white">
                        <img src="<?php echo e(asset('dist/img/all.png')); ?>"
                             class="rounded m-auto" alt="">
                        <div class="">
                            <span class="d-none d-sm-block">ALL</span>
                        </div>
                    </a>
                </div>
                <?php $__currentLoopData = $sports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slide text-center">
                        <a href="<?php echo e(route('sport.id',['id'=>$sport->id])); ?>"
                           class="text-white">
                            <img src="<?php echo e($sport->icon); ?>"
                                 class="rounded m-auto" alt="">
                            <div class="">
                                <span class="d-none d-sm-block"><?php echo e($sport->name); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </section>
    <div class="mt-3">
        <?php
        foreach ($selectedSports as $selectedSport) {
        $matches = \App\Models\Match::where('sport_id', $selectedSport->id)
            ->where('status_id', 2)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card">
            <div class="card-header">
                <img src="<?php echo e($selectedSport->icon); ?>"
                     class="rounded float-left pr-2" alt="" height="30px">
                <span class="float-left text-bold text-white"><?php echo e($selectedSport->name); ?></span>
                <div class="">
                    <div class="<?php echo e(($match->status_id==1)?'bg-danger bs ':''); ?>">
                        <img src="<?php echo e(asset('dist/img/live.gif')); ?>" alt="" height="30px">

                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="row border-secondary mb-2">
                        <div class="col-sm-12 col-md-4 btn btn-sm bg-secondary bs"><span
                                    class="pr-2"><?php echo e(\App\Models\TeamOrPlayer::find($match->contestant_one)->name); ?></span><img src="<?php echo e(asset('dist/img/vs.png')); ?>" height="20px" alt=""><span
                                    class="pl-2"><?php echo e(\App\Models\TeamOrPlayer::find($match->contestant_two)->name); ?></span>
                        </div>
                        <div class="col-sm-12 col-md-3 btn btn-sm bg-warning bs">
                            <span class="pr-2"><?php echo e($match->title); ?></span>
                        </div>
                        <div class="col-sm-12 col-md-2 btn btn-sm bg-white bs">
                            <span><?php echo e(date('d M', strtotime($match->start_date))); ?></span> |
                            <span><?php echo e(date("g:i a", strtotime($match->start_time))); ?></span></div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom  border-secondary">
                        <div class="col-sm-12 col-md-3 align-middle">
                            <div class="row align-middle h-100 pt-1 pb-1">
                                <div class="col-sm-12 col-md-2 m-auto text-center">
                                    <img src="<?php echo e($selectedSport->icon); ?>"
                                         class="rounded" alt="" height="30px">
                                </div>
                                <div class="col-sm-12 col-md-10 text-bold m-auto text-white">
                                    <?php echo e($question->question); ?> <img src="<?php echo e(asset('dist/img/live2.gif')); ?>" alt=""  height="12px">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 border-left border-secondary m-0 p-0">
                            <div class="row m-0 p-0">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="<?php echo e(route('create.bet',['id'=>$choice->id])); ?>"
                                   class="col-4 m-0 p-0">
                                    <div class="bg-secondary bs rounded p-1">
                                        <span><?php echo e($choice->choice_name); ?></span><span
                                                class="text-bold text-warning pl-2">   <?php echo e($choice->wining_rate); ?></span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>
        
        <?php
        foreach ($selectedSports as $selectedSport) {
        $matches = \App\Models\Match::where('sport_id', $selectedSport->id)
            ->where('status_id', 1)
            ->where('is_open', 1)->get();
        foreach ($matches as $match) { ?>
        <div class="card ">
            <div class="card-header text-center">
                <img src="<?php echo e($selectedSport->icon); ?>"
                     class="rounded float-left pr-2" alt="" height="30px">
                <span class="float-left text-bold text-white"><?php echo e($selectedSport->name); ?></span>
                <div class="ml-auto float-right">
                    <div class="<?php echo e(($match->status_id==1)?'bg-danger bs ':''); ?> btn btn-sm">
                        &nbsp;&nbsp; <i class="fas fa-spinner fa-spin"></i> &nbsp; <?php echo e($match->status->name); ?>

                    </div>
                </div>
            </div>

            <div class="card-body m-2">
                <nav>
                    <div class="border-secondary mb-2">
                        <div class="col-sm-12 col-md-4 btn btn-sm bg-secondary bs"><span
                                    class="pr-2"><?php echo e(\App\Models\TeamOrPlayer::find($match->contestant_one)->name); ?></span><img src="<?php echo e(asset('dist/img/vs.png')); ?>" height="20px" alt=""><span
                                    class=" pl-2"><?php echo e(\App\Models\TeamOrPlayer::find($match->contestant_two)->name); ?></span>
                        </div>
                        <div class="col-sm-12 col-md-3 btn btn-sm bg-warning bs">
                            <span class="pr-2"><?php echo e($match->title); ?></span>
                        </div>
                        <div class="col-sm-12 col-md-2 btn btn-sm bg-white bs">
                            <span><?php echo e(date('d M', strtotime($match->start_date))); ?></span> |
                            <span><?php echo e(date("g:i a", strtotime($match->start_time))); ?></span></div>
                    </div>
                </nav>
                <?php
                $questions = \App\Models\BettingQuestion::where('match_id', $match->id)->get();
                foreach ($questions as $question) { ?>
                <div>
                    <div class="row border-bottom border-secondary">
                        <div class="col-sm-12 col-md-3 align-middle">
                            <div class="row align-middle h-100 pt-1 pb-1">
                                <div class="col-sm-12 col-md-2 m-auto text-center">
                                    <img src="<?php echo e($selectedSport->icon); ?>"
                                         class="rounded" alt="" height="30px">
                                </div>
                                <div class="col-sm-12 col-md-10 text-bold m-auto text-white">
                                    <?php echo e($question->question); ?><span class="m-auto"> <i class="fas fa-spinner fa-spin"></i><span class="text-warning" style="font-size: 10px"> Upcoming</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9 border-left border-secondary">
                            <div class="row">
                                <?php
                                $choices = \App\Models\BettingChoice::where('betting_question_id', $question->id)->get();
                                foreach ($choices as $choice) { ?>
                                <a href="<?php echo e(route('create.bet',['id'=>$choice->id])); ?>"
                                   class="col-4 p-0 m-0">
                                    <div class="bg-secondary bs rounded p-1">
                                        <span><?php echo e($choice->choice_name); ?></span><span
                                                class="text-bold text-warning pl-2"> <?php echo e($choice->wining_rate); ?></span></div>
                                </a>
                                <?php
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }
        }
        ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/frontend/index.blade.php ENDPATH**/ ?>