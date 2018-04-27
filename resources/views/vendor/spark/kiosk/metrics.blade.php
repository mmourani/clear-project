<spark-kiosk-metrics :user="user" inline-template>
    <!-- The Landsman™ -->
    <div>


                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header bg-success">
                                    <h2 class="metric-title mb-0 text-white">
                                        {{__('Monthly Recurring Revenue')}}
                                    </h2>
                                </div>
                                <div class="card-body text-center">
                                    <p class="metric-stat mb-0">
                                        @{{ monthlyRecurringRevenue | currency }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h2 class="metric-title mb-0 text-white">
                                            {{__('Yearly Recurring Revenue')}}
                                        </h2>
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="metric-stat mb-0">
                                            @{{ yearlyRecurringRevenue | currency }}
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h2 class="metric-title mb-0 text-white">
                                            {{__('Total Volume')}}
                                        </h2>
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="metric-stat">
                                            @{{ totalVolume | currency }}
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="col-6">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h2 class="metric-title mb-0 text-white">
                                            @if(Spark::teamTrialDays())
                                                {{__('teams.teams_currently_trialing')}}
                                            @else
                                                {{__('Users Currently Trialing')}}
                                            @endif
                                        </h2>
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="metric-stat">
                                            @{{ totalTrialUsers }}
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>

        <!-- Monthly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">{{__('Monthly Recurring Revenue')}}</div>

                    <div class="card-body">
                        <canvas id="monthlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Yearly Recurring Revenue Chart -->
        <div class="row" v-show="indicators.length > 0">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">{{__('Yearly Recurring Revenue')}}</div>

                    <div class="card-body">
                        <canvas id="yearlyRecurringRevenueChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" v-show="indicators.length > 0">
            <!-- Daily Volume Chart -->
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">{{__('Daily Volume')}}</div>

                    <div class="card-body">
                        <canvas id="dailyVolumeChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            <!-- Daily New Users Chart -->
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">{{__('New Users')}}</div>

                    <div class="card-body">
                        <canvas id="newUsersChart" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subscribers Per Plan -->
        <div class="row metric-table" v-if="plans.length > 0">
            <div class="col-md-12">
                <div class="card card-default border-primary">
                    <div class="card-header bg-primary text-white">{{__('Subscribers')}}</div>

                    <div class="table-responsive">
                        <table class="table table-valign-middle mb-0">
                            <thead>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Subscribers')}}</th>
                            <th>{{__('Trialing')}}</th>
                            </thead>

                            <tbody>
                            <tr v-if="genericTrialUsers">
                                <td>
                                    <div class="btn-table-align">
                                        {{__('On Generic Trial')}}
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-table-align">
                                        {{__('N/A')}}
                                    </div>
                                </td>

                                <td>
                                    <div class="btn-table-align">
                                        @{{ genericTrialUsers }}
                                    </div>
                                </td>
                            </tr>
                            <tr v-for="plan in plans">
                                <!-- Plan Name -->
                                <td>
                                    <div class="btn-table-align">
                                        @{{ plan.name }} (@{{ __(plan.interval) | capitalize }})
                                    </div>
                                </td>

                                <!-- Subscriber Count -->
                                <td>
                                    <div class="btn-table-align">
                                        @{{ plan.count }}
                                    </div>
                                </td>

                                <!-- Trialing Count -->
                                <td>
                                    <div class="btn-table-align">
                                        @{{ plan.trialing }}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</spark-kiosk-metrics>
