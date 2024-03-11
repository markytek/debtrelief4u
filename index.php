<?php
   require __DIR__ . '/vendor/autoload.php';
   use \Waavi\Sanitizer\Sanitizer;
   $xss = new \Shieldon\Security\Xss();
   // $_GET = $xss->clean($_GET);
   $phone = '(888) 226-9524';
   $tel = '18882269524';
   $year = date('Y');
   $company = 'Debt Relief';
   $IP = file_get_contents('https://api.ipify.org');

   $reqData = [
      'reqId'                 => isset($_GET['req_id'])?$_GET['req_id']:'',
      'cid'                   => isset($_GET['cid'])?$_GET['cid']:'',
      'remoteAddress'         => isset($IP)?$IP: '',
      'source'                => isset($_GET['source'])?$_GET['source']:'',
      's1'                    => isset($_GET['s1'])?$_GET['s1']:'',
      's2'                    => isset($_GET['s2'])?$_GET['s2']:'',
      's3'                    => isset($_GET['s3'])?$_GET['s3']:'',
      's4'                    => isset($_GET['s4'])?$_GET['s4']:'',
      's5'                    => isset($_GET['s5'])?$_GET['s5']:'',
      'userAgent'             => isset($_SERVER["HTTP_USER_AGENT"])?$_SERVER["HTTP_USER_AGENT"]: '',
   ];
   
   $reqFilters = [];
   
   foreach ($reqData as $key => $value) {
      $reqFilters[$key] = 'trim|escape|strip_tags';
   }
   
   $sanitizer  = new Sanitizer($reqData, $reqFilters);
   $reqSanitised = $sanitizer->sanitize();
   
   
   if (!empty($reqSanitised["reqId"])) {
      $req_id = $reqSanitised["reqId"];
   } else {
      if (!empty($reqSanitised["cid"])) {
          $req_id = $reqSanitised["cid"];
      } else {
          $req_id = '';
      }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon" />
    <title>Debt Relief</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body id="top">
    <pre>
         <?php print_r($reqData);?>
   </pre>
    <header class="page-header">
        <div class="container">
            <div class="page-header-wrapper">
                <div class="logo"><img src="assets/img/logo.png" alt=""></div>
                <div class="page-header-btn">
                    <a href="tel:0000-000-000"><i class="fa-solid fa-phone"></i> <span>000-000-0000</span></a>
                </div>
            </div>
        </div>
    </header>

    <section class="masterhead">
        <div class="container">
            <div class="masterhead-wrapper">
                <div class="masterhead-content">
                    <h1>Start your free <span> debt relief</span> consultation</h1>
                    <p>A debt-free life is possible! Debt Relief can help you lower your total debt and pay off your
                        unsecured debt faster. Contact us today to find out how.</p>
                </div>
                <div class="masterhead-right" id="formApp">
                    <div class="card">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"></li>
                                <li id="personal"></li>
                                <li id="payment"></li>
                            </ul>
                            <br>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="fs-title">Choose your debt amount*</h2>
                                        </div>
                                    </div>
                                    <div class="price-rage-value">
                                        <div class="value">10000</div>
                                        <input type="range" min="10000" max="100000" step="1000" value="0">
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Continue >" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="fs-title">Where are you located?</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-col">
                                                <label class="fieldlabels">Zip Code *</label>
                                                <input type="number" name="fname" placeholder="Please Enter Zip Code" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="< Back" />
                                <input type="button" name="next" class="next action-button" value="Continue >" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="fs-title">Contact Information</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-col">
                                                <label class="fieldlabels">First Name *</label>
                                                <input type="text" name="" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-col">
                                                <label class="fieldlabels">Last Name *</label>
                                                <input type="text" name="" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-col">
                                                <label class="fieldlabels">Email Address *</label>
                                                <input type="Email" name="" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-col">
                                                <label class="fieldlabels">Phone *</label>
                                                <input type="number" name="" placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <p class="form-info">By clicking "Submit" you consent to allowing Debt Relief to
                                        contact you as described below.</p>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="< Back" />
                                <input type="button" name="next" class="next action-button" value="Continue >" />
                                <p class="form-info">By submitting this form, I am providing Debt Relief, with express
                                    written consent to contact me regarding product offerings by SMS/text messages or by
                                    using an auto dialer (or automated means) at the phone number(s) provided and such
                                    consent is not a condition of a purchase. I further consent to contact before 8am or
                                    after 9pm in my local time to allow for a prompt response to this inquiry. Message
                                    and data rates may apply. I also consent and agree to Debt Relief’s <a
                                        href="#">Privacy Policy</a> and <a href="#">Terms of Use.</a></p>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h2 class="fs-title">Finish:</h2>
                                        </div>
                                    </div>
                                    <h2 class="purple-text text-center">
                                        <strong>SUCCESS !</strong>
                                    </h2>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5 class="purple-text text-center">Thanks For your Request. We Will Update
                                                You</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="heading">
                <h2>How It Works</h2>
                <p>You’re in control, our debt experts do the work.</p>
            </div>
            <div class="about-wrapper">
                <div class="about-item">
                    <div class="about-icon">
                        <img src="assets/img/about-icon-1.svg" alt="">
                    </div>
                    <div class="about-content">
                        <h3>Talk to us for a free consultation</h3>
                        <p>Tell us your situation, then find out your debt relief options – no obligation.</p>
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-icon">
                        <img src="assets/img/about-icon-2.svg" alt="">
                    </div>
                    <div class="about-content">
                        <h3>We create an affordable plan that works for you</h3>
                        <p>Approve your plan, personalized from our suite of products.</p>
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-icon">
                        <img src="assets/img/about-icon-3.svg" alt="">
                    </div>
                    <div class="about-content">
                        <h3>Get out of debt faster than you think</h3>
                        <p>Get back to financial stability and living your life within 24-48 months.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="accordian">
        <div class="container">
            <div class="heading">
                <h2>Debt Relief FAQs</h2>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-6">
                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">What’s the difference between debt settlement, debt relief, and
                            debt resolution?</h2>
                        <div class="accordionItemContent">
                            <p>“Debt settlement,” “debt relief,” and “debt resolution” are terms frequently used
                                interchangeably to describe the process where you or a company acting on your behalf
                                will negotiate with your creditors to reduce the amount of debt that you owe, with the
                                goal of paying off your enrolled debt entirely.</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">How long will it take to become debt-free?</h2>
                        <div class="accordionItemContent">
                            <p>Many customers who complete our program pay off their enrolled debts in as little as just
                                24-48 months. Compared to spending years and years making the minimum monthly payments
                                and accumulating interest at a high rate, debt relief can be a quicker, cheaper, and
                                easier way to reach your goal of becoming debt free.</p>
                            <p>Want to see how much time and money you could save by enrolling in our Debt Relief
                                Program? Check out our Debt Repayment Calculator.</p>
                            <p>Calculate Your Repayment Time</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Are there any hidden fees?</h2>
                        <div class="accordionItemContent">
                            <p>The fee we take for settling your debt is calculated into your quoted monthly payment
                                that we work out from the get-go. If you complete the program faster or slower, our fee
                                remains the same; Debt Relief will never charge you hidden fees.</p>
                            <p>This fee is a percentage of each debt that you enroll in the program and settle, and that
                                percentage varies from client to client based on their individual situation. If we can’t
                                settle a specific debt for you, we won’t take a fee on that debt.</p>
                            <p>The dedicated program account provider will take a fee; you can review the specifics of
                                potential provider fees in your enrollment contract with us or in a separate agreement
                                with an outside account provider of your choosing.</p>
                            <P>We also offer optional “legal insurance” to our clients through an outside law firm for a
                                small monthly fee. That is, if one of your accounts goes delinquent and your creditor
                                takes legal action, a law firm whose plan we offer will represent you. This helpful
                                service is optional; whether or not you choose to sign up for this service is your
                                decision.</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Should I keep paying my credit card bills?</h2>
                        <div class="accordionItemContent">
                            <p>Clients enter our Debt Resolution Program because they are struggling to make ends meet.
                                While we don’t advise anyone to stop paying their credit card bills, it’s important to
                                note that continuing to make payments could impact our leverage when negotiating with
                                creditors. The decision to stop paying your creditors is yours.</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">How will debt relief affect my taxes?</h2>
                        <div class="accordionItemContent">
                            <p>Debt Relief cannot and does not offer tax advice, but in general, if your debt is
                                canceled, forgiven, or discharged for less than the amount owed, the amount of the
                                canceled debt is taxable. If taxable – usually if the debt exceeds $600.00 – you must
                                report the resolved debt on your tax return for the year in which the cancellation
                                occurred. That said, this does not necessarily mean you owe taxes on the forgiven
                                portion. In many cases, clients can legally exclude resolved debt from their income
                                through the “insolvency exclusion” provided by the IRS code. This exclusion means that
                                your liabilities exceed the fair market value of your assets, or that you “owe” more
                                than you “own.” To learn more, please consult the IRS or a tax professional directly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6">
                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Is debt relief the same as a debt consolidation loan?</h2>
                        <div class="accordionItemContent">
                            <p>Despite having similar names, debt relief and debt consolidation are not the same thing.
                                Debt consolidation is the process wherein you pay off all your monthly debts with a
                                single loan, resulting in just one monthly payment. Both debt consolidation and debt
                                relief share the ultimate goal of getting you out of debt, but debt consolidation loan
                                options will typically require you to have good credit to qualify or may have interest
                                rates that are not much better than your current rates. They do make it easier to
                                remember to pay one bill each month instead of juggling many pre-consolidation debts.
                            </p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Will I have to file for bankruptcy?</h2>
                        <div class="accordionItemContent">
                            <p>Debt relief is often seen as a less drastic alternative to bankruptcy. While both
                                bankruptcy and debt relief can get rid of your debt, they use very different methods to
                                achieve that goal.</p>
                            <P>For one, debt relief programs typically operate on a shorter timeline than bankruptcy
                                would. Additionally, while both negatively impact your credit score, bankruptcy can stay
                                on a credit report for up to 10 years, which is longer than for debt settlement.</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Is debt relief right for me?</h2>
                        <div class="accordionItemContent">
                            <p>Like any solution to overwhelming debt, the debt relief process has its pros and cons—but
                                you’re the only person who can decide if it’s worth it.</p>
                            <p>Because debt relief is a major commitment, you’ll want to do some digging about what your
                                financial goals are by asking yourself a few key questions.</p>
                            <P>What am I using my credit for? Do my goals require me to have a decent credit score in
                                the short term, or do I want to have an excellent score in the long term? Can I afford
                                to make a monthly payment toward my debts?</P>
                            <p>Again, you’re the one who knows your situation and your money goals best. You might
                                conclude that debt resolution isn’t right for you—or you might realize that it’s the
                                best thing to happen to your finances! If you’re unsure, our team of certified debt
                                specialists is available to help you make an informed decision.</p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Should I include all of my debts into the debt resolution
                            program?</h2>
                        <div class="accordionItemContent">
                            <p>In order to optimize the success of our Debt Resolution Program, we strongly recommend
                                that all of your qualified debts be enrolled. Your debt consultant will explain the
                                enrollment process and point out the potential pros and cons to excluding any qualified
                                debts. </p>
                        </div>
                    </div>

                    <div class="accordionItem close">
                        <h2 class="accordionItemHeading">Will I continue to accrue interest and late fees?</h2>
                        <div class="accordionItemContent">
                            <p>Yes, interest and late fees will typically continue to accumulate, however our
                                experienced negotiating team will always attempt to settle your debt with your original
                                balance in mind. <br>Again, you’re the one who knows your situation and your financial
                                goals best. You might conclude that debt resolution isn’t right for you—or you might
                                realize that it’s the best thing to happen to your finances! If you’re unsure, our team
                                of certified debt specialists is available to help you make an informed decision.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="page-footer">
        <div class="page-footer-top">
            <div class="container">
                <h3>© 2024, National Debt Relief, All Rights Reserved.</h3>
                <p>Please note that all calls with the company may be recorded or monitored for quality assurance and
                    training purposes. *Clients who are able to stay with the program and get all their debt settled
                    realize approximate savings of 46% before fees, or 25% including our fees, over 24 to 48 months. All
                    claims are based on enrolled debts. Not all debts are eligible for enrollment. Not all clients
                    complete our program for various reasons, including their ability to save sufficient funds.
                    Estimates based on prior results, which will vary based on specific circumstances. We do not
                    guarantee that your debts will be lowered by a specific amount or percentage or that you will be
                    debt-free within a specific period of time. We do not assume consumer debt, make monthly payments to
                    creditors or provide tax, bankruptcy, accounting or legal advice or credit repair services. Not
                    available in all states. Please contact a tax professional to discuss tax consequences of
                    settlement. Please consult with a bankruptcy attorney for more information on bankruptcy. Depending
                    on your state, we may be available to recommend a local tax professional and/or bankruptcy attorney.
                    Read and understand all program materials prior to enrollment, including potential adverse impact on
                    credit rating.</p>
                <p>This website uses "cookies" to enhance your browsing experience and for marketing and tracking
                    purposes. By continuing to browse our site you are consenting to their use. For more information see
                    our Terms and Privacy Policy.</p>
            </div>
        </div>
        <div class="page-footer-bottom">
            <div class="container">
                <p>180 Maiden Lane, 30th Floor, New York, NY 10038 All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>

</body>

</html>