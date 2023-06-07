@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="spark-screen container">
        <div class="row">
            <div class="col-md-8 col-center">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome!</div>

                    <div class="panel-body">
                        <p>This application is built to help you (and your team) get clear on what success looks like and ensure you are working on the most important things. You will define clear metrics for success, align all team members involved, record ongoing results, and do timely review and iterations to help reach your goals. We will setup the high-level strategic portion first, and then move onto the tactics to get things done.</p>
                        <p>We start with the <strong>strategic layer</strong> of the business, having you insert your current high-level business goals and objectives. The purpose of this is to help you maintain alignment to your greatest business needs when the day to day is pulling you in many different directions.</p>
                        <p>Once that is completed, we move to the <strong>tactical layer</strong>. Aligning tactical work with business goals helps ensure that the work that you are doing is moving the business in the right direction.</p>
                        <p>We have created a flexible platform that allows you to insert <strong>metrics in your own terms</strong>. This means you can setup projects or initiatives of any type (examples: marketing campaign, budgetary initiative, physical product) and define metrics for success that are directly related and understood within your business.</p>

                        <h5>Building Your Target</h5>
                        <p>
                            <img src="/img/dartboard-stage1.svg" alt="Dartboard partial for first stage of process" style="height: 50px;padding-right: 4em;">
                            <img src="/img/dartboard-stage2.svg" alt="Dartboard partial for second stage of process" style="height: 50px;padding-right: 4em;">
                            <img src="/img/dartboard-stage3.svg" alt="Dartboard partial for third stage of process" style="height: 50px;padding-right: 4em;">
                            <img src="/img/dartboard-stage4.svg" alt="Dartboard partial for fourth stage of process" style="height: 50px;padding-right: 4em;">
                            <img src="/img/dartboard-stage5.svg" alt="Dartboard completed for fifth stage of process" style="height: 50px;padding-right: 4em;"></p>
                        </p>
                        <p>We are starting you off with a clean slate and progressively building the target that your time and resources will focus on.</p>

                        <h5>Let's jump in and get started!</h5>

                        <a href="{{ route('goals.index') }}"><button class="btn btn-primary">Let's Go! <i class="fa fa-chevron-circle-right"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
