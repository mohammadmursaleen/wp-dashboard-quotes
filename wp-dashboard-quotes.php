<?php
/**
 * Plugin Name: Wp Dashboard Quotes
 * Plugin URI: http://www.trendclickers.com/
 * Description: Displays random Quotes in your dashboard. Inspired from Hello Dolly. 
 * Version: 1.0
 * Author: Mohammad Mursaleen
 * Author URI: http://www.trendclickers.com/
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

function dashboard_random_quotes() {


	$quotes = "If you cannot do great things, do small things in a great way.
No act of kindness, no matter how small, is ever wasted.
All our words from loose using have lost their edge.
God couldn't be everywhere, so he created mothers.
Learn from yesterday, live for today, hope for tomorrow.
Be not afraid of going slowly, be afraid only of standing still.
Happiness will never come to those who fail to appreciate what they already have.
Without His love I can do nothing, with His love there is nothing I cannot do.
I hear and I forget, I see and I remember. I do and I understand.
In teaching others we teach ourselves.
There is only one happiness in life -- to love and to be loved.
One day your life will flash before your eyes. Make sure its worth watching.
Life is not a problem to be solved, but a reality to be experienced.
In three words I can sum up everything I've learned about life. It goes on.
Where there is love there is life.
Friendship often ends in love; but love in friendship, never.
Love is a serious mental disease.
To live is the rarest thing in the world. Most people exist, that is all.
The best part of beauty is that which no picture can express.
A heart that loves is always young.
If I had eight hours to chop down a tree, I'd spend six sharpening my ax.
Don't trust the person who has broken faith once.
The magic of first love is our ignorance that it can never end.
If a man hasn't discovered something that he will die for, he isn't fit to live.
Before you embark on a journey of revenge, dig two graves.
If you tell the truth, you don't have to remember anything.
Love will find a way. Indifference will find an excuse.
Love may be blind, but it can sure find its way around in the dark!
The only thing we have to fear is fear itself.
Those who deny freedom to others, deserve it not for themselves.
Life is what happens while you're busy making other plans.
Courage leads to heaven; fear leads to death.
Initiative is doing the right thing without being told.
Ask not what your country can do for you, ask what you can do for your country.
What is important in life is life, and not the result of life.
An unexamined life is not worth living.
Live for love. Without love, you don't live.
Death is the wish of some, the relief of many, and the end of all.
The most I can do for my friend is simply be his friend.
The journey of a thousand miles must begin with a single step.
If you have knowledge, let others light their candles with it.
A child miseducated is a child lost.
We are born crying, live complaining, and die disappointed.
Love is an irresistible desire to be irresistibly desired.
Love is the beauty of the soul.
Happiness is when what you think, what you say, and what you do are in harmony.
To improve is to change; to be perfect is to change often.
One cannot think well, love well, sleep well, if one has not dined well.
Men never remember, but women never forget.
Some cause happiness wherever they go; others whenever they go.
Our greatest glory is not in never falling, but in rising every time we fall.
A loving heart is the truest wisdom.
The secret in education lies in respecting the student.
Do what you feel in your heart to be right. You'll be criticized anyway.
Everything has beauty, but not everyone sees it.
He who dares to teach must never cease to learn.
A person will be just about as happy as they make up their minds to be.
The rose speaks of love silently, in a language known only to the heart.
The best way to find yourself is to lose yourself in the service of others.
No three words have greater power than I Love You.
Every accomplishment starts with the decision to try.
Drunkenness is nothing but voluntary madness.
Tell the truth and then run.
Once you have learned to love, You will have learned to live.
Whatever your past has been your future is spotless.
When it becomes more difficult to suffer than change -- then you will change.
Love is the master key which opens the gates of happiness.
A successful person is a dreamer whom someone believed in.
A wise man makes his own decisions, an ignorant man follows the public opinion.
Patience, persistence and perspiration make an unbeatable combination for success.
Life's tragedy is that we get old too soon and wise too later.
When you're finished changing, you're finished.
The advertisements are the most truthful part of a newspaper.
No bees, no honey; no work, no money.
A mother's heart is always with her children.
Better to remain silent and be thought a fool, than to speak and remove all doubt.
Great minds discuss ideas; average minds discuss events; small minds discuss people.
Life can only be understood backwards, but it must be lived forward.
There is no remedy for love than to love more.
Knowledge has to be improved, challenged, and increased constantly, or it vanishes.
Happiness depends upon ourselves.
He who fears being conquered is sure of defeat.
The best way to appreciate your job is to imagine yourself without one.
Wise men are not always silent, but they know when to be.
It's not the size of the dog in the fight, it's the size of the fight in the dog.
With true friends... even water drunk together is sweet enough.
The family is one of nature's masterpieces.
Two persons cannot long be friends if they cannot forgive each other's little failings.
You may delay, but time will not, and lost time is never found again.
No one can cheat you out of ultimate success but yourself.
Is life worth living? It all depends on the liver.
Love is something eternal; the aspect may change, but not the essence.
Failure is nature's plan to prepare you for great responsibilities.
It is never too late to be what you might have been.
Our dead are never dead to us, until we have forgotten them.
Teachers open the door but you must walk through it yourself.
Follow love and it will flee, flee love and it will follow.
Love is an act of endless forgiveness, a tender look which becomes a habit.
You must be the change you wish to see in the world.
Chose a job you love, and you will never have to work a day in your life.
A friend walks in when everyone else walks out.
The true sign of intelligence is not knowledge but imagination.
True love is like ghosts, which everybody talks about and few have seen.
Either write something worth reading or do something worth writing.
The way to love anything is to realize that it might be lost.";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose one of the quote
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This function just echoes the chosen quote
function display_random_quote() {
	$chosen = dashboard_random_quotes();
	echo "<p id='random-quotes'><b> ". '"' ." $chosen ". '"' ."<b></p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'display_random_quote' );

// We need some CSS to position our quote
function random_quote_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#random-quotes {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'random_quote_css' );
