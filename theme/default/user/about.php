<?php
/**
 * Display user about page
 *
 * @link http://wp3.in
 * @since unknown
 * @package AnsPress
 */
?>
<div class="ap-about">
	<div class="row">
		<div class="col-md-8">
			<div class="ap-about-block">
				<h3><?php echo ap_icon('reputation', true); ?> <?php _e('Reputation', 'ap'); ?></h3>
				<div class="ap-about-block-c">		
					<div class="ap-about-rep clearfix">
						<div class="ap-pull-left">
							<span class="ap-about-rep-label"><?php _e('Total', 'ap'); ?></span>
							<span class="ap-about-rep-count"><?php ap_user_the_reputation(); ?></span>
						</div>
						<div class="ap-about-rep-chart">
							<span data-action="ap_chart" data-type="bar" data-peity='{"fill" : ["#8fc77e"], "height": 45, "width": "100%"}'><?php echo ap_user_get_28_days_reputation(); ?></span>		
						</div>
						<div class="ap-user-rep">
							<?php
								if(ap_has_reputations(array('number' => 5))){
									while ( ap_reputations() ) : ap_the_reputation();
										ap_get_template_part('user/reputation-content');
									endwhile;
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<!--<div class="ap-about-block">
				<h3><?php echo ap_icon('rank', true); ?> <?php _e('Ranks', 'ap'); ?></h3>
				<div class="ap-about-description ap-about-block-c">
					<ul class="ap-rank-list">
						<li class="clearfix">
							<span class="ap-rank-list-index">1</span>
							<div class="ap-rank-list-c">
								<span class="ap-rank-label ap-rank-type-core-developer" style="background:#2cc4ff;">Core Developer</span>
							</div>
							<span class="ap-rank-list-info">User is a AnsPress core contributor.</span>
							<a href="#" class="ap-rank-list-help"><?php echo ap_icon('info', true); ?></a>
						</li>
						<li class="clearfix">
							<span class="ap-rank-list-index">2</span>
							<div class="ap-rank-list-c">
								<span class="ap-rank-label ap-rank-type-staff" style="background:#FF8E2C;">Staff</span>
							</div>
							<span class="ap-rank-list-info">User is a AnsPress support staff.</span>
							<a href="#" class="ap-rank-list-help"><?php echo ap_icon('info', true); ?></a>
						<li class="clearfix">
							<span class="ap-rank-list-index">3</span>
							<div class="ap-rank-list-c">
								<span class="ap-rank-label ap-rank-type-contributor" style="background:#ff5a48;">Contributor</span>
							</div>
							<span class="ap-rank-list-info">User contributed in AnsPress development.</span>
							<a href="#" class="ap-rank-list-help"><?php echo ap_icon('info', true); ?></a>
						</li>
					</ul>
				</div>
			</div>-->
			<div class="ap-about-block">
				<h3><?php echo ap_icon('thumbs-up-down', true); ?> <?php _e('Votes', 'ap'); ?></h3>
				<div class="ap-about-block-c">		
					<div class="ap-about-votes row">
						<div class="col-md-6">
							<span class="ap-about-vote-label"><?php printf(__('%d votes received', 'ap'), ap_user_total_votes_received()); ?></span>
							<span data-action="ap_chart" data-type="donut" data-peity='{ "fill": ["#9087FF", "#eeeeee"],   "innerRadius": 20, "radius": 25 }'><?php echo ceil((ap_user_get_the_meta('__up_vote_received')/ap_user_total_votes_received())*100); ?>/100</span>
							<span class="ap-vote-count"><b><?php ap_user_the_meta('__up_vote_received'); ?></b><?php _e('up', 'ap'); ?></span>
							<span class="ap-vote-count"><b><?php ap_user_the_meta('__down_vote_received'); ?></b><?php _e('down', 'ap'); ?></span>	
						</div>
						<div class="col-md-6">
							<span class="ap-about-vote-label"><?php printf(__('%d votes casted', 'ap'), ap_user_total_votes_casted()); ?></span>
							<span data-action="ap_chart" data-type="donut" data-peity='{ "fill": ["#9087FF", "#eeeeee"],   "innerRadius": 20, "radius": 25 }'><?php echo ceil((ap_user_get_the_meta('__up_vote_casted')/ap_user_total_votes_casted())*100); ?>/100</span>
							<span class="ap-vote-count"><b><?php ap_user_the_meta('__up_vote_casted'); ?></b><?php _e('up', 'ap'); ?></span>
							<span class="ap-vote-count"><b><?php ap_user_the_meta('__down_vote_casted'); ?></b><?php _e('down', 'ap'); ?></span>							
						</div>						
					</div>
				</div>
			</div>		
		</div>
		<div class="col-md-4">
			<ul class="ap-about-stats">
				<li><?php echo ap_icon('answer', true); ?><?php printf(__('%d answers, %d selected', 'ap'), ap_user_get_the_meta('__total_answers'), ap_user_get_the_meta('__best_answers')); ?></li>
				<li><?php echo ap_icon('question', true); ?><?php printf(__('%d questions, %d solved', 'ap'), ap_user_get_the_meta('__total_questions'), ap_user_get_the_meta('__solved_answers')); ?></li>
				<li><?php echo ap_icon('history', true); ?><?php printf(__('Member for %s', 'ap'), ap_user_get_member_for()); ?></li>
				<li><?php echo ap_icon('eye', true); ?><?php printf(__('%d profile views', 'ap'), ap_user_get_the_meta('__profile_views')); ?></li>
				<li><?php echo ap_icon('clock', true); ?><?php printf(__('Last seen %s ago', 'ap'), ap_human_time(ap_user_get_the_meta('__last_active'), false)); ?></li>
			</ul>
			<?php dynamic_sidebar( 'ap-user-about' ); ?>
		</div>
	</div>
</div>