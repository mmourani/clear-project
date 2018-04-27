<form class="form-horizontal" role="form">
@if (Spark::usesTeams() && Spark::onlyTeamPlans())


    <!-- Team Name -->
        <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
            <div class="col-md-12">
                <input type="text" class="form-control" name="team" v-model="registerForm.team" autofocus placeholder="{{ ucfirst(Spark::teamsPrefix()) }} Name">
                <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>
    @if (Spark::teamsIdentifiedByPath())
        <!-- Team Slug (Only Shown When Using Paths For Teams) -->
            <div class="form-group" :class="{'has-error': registerForm.errors.has('team_slug')}" v-if=" ! invitation">
                <label class="col-md-4 control-label">{{ ucfirst(Spark::teamsPrefix()) }} Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="team_slug" v-model="registerForm.team_slug" autofocus>
                    <p class="help-block" v-show=" ! registerForm.errors.has('team_slug')">
                        This slug is used to identify your {{ Spark::teamsPrefix() }} in  URLs.
                    </p>
                    <span class="help-block" v-show="registerForm.errors.has('team_slug')">
                        @{{ registerForm.errors.get('team_slug') }}
                    </span>
                </div>
            </div>
    @endif
@endif
<!-- Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('name')}">
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" v-model="registerForm.name" autofocus placeholder="Name">
            <span class="help-block" v-show="registerForm.errors.has('name')">
                @{{ registerForm.errors.get('name') }}
            </span>
        </div>
    </div>
    <!-- E-Mail Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
        <div class="col-md-12">
            <input type="email" class="form-control" name="email" v-model="registerForm.email" placeholder="E-Mail Address">
            <span class="help-block" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>
    <!-- Password -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
        <div class="col-md-12">
            <input type="password" class="form-control" name="password" v-model="registerForm.password" placeholder="Password">
            <span class="help-block" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>
    <!-- Password Confirmation -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
        <div class="col-md-12">
            <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation" placeholder="Confirm Password">
            <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>
    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
            <div class="col-md-12">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" v-model="registerForm.terms"> I Accept The <a href="/terms" target="_blank">Terms and Conditions</a>
                    </label>
                    <br/>
                    <span class="help-block" v-show="registerForm.errors.has('terms')">
                        @{{ registerForm.errors.get('terms') }}
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <button class="btn btn-primary btn-block" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>&nbsp;&nbsp;Registering
                    </span>
                    <span v-else>
                        &nbsp;&nbsp;Register
                    </span>
                </button>
            </div>
        </div>
        <div class="pl-3">
            <span class="sign-in">Already a member? <a href="{{ url('/login') }}">Sign In</a></span>
        </div>
        <div class="row text-center social_register">
            <div class="col-md-12 col-xs-12">
                <p class="alter">Sign up with</p>

                <div class="col-12">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#" class="btn btn-lg btn-facebook">
                                <i class="ti-facebook"></i>
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#" class="btn btn-lg btn-twitter">
                                <i class="ti-twitter-alt"></i>
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#" class="btn btn-lg btn-google">
                                <i class="ti-google"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
