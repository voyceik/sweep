
<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Policies and Disclaimers - NCBI</title>



<link rel="stylesheet" type="text/css" href="../../action-pgs.css"/>
    <meta name="ncbi_app" content="guide4beta" />
<meta name="ncbi_pdid" content="action" />

<script type="text/javascript">
    var ncbi_startTime = new Date();
</script>


    <link media="only screen and (max-width: 905px)" rel="stylesheet" href="../../medium_screen.css" />

    <link rel="stylesheet" type="text/css" href="../../components/normalize-css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="../../components/ncbi-standards/standard_base.css" />
    <link rel="stylesheet" type="text/css" href="../../new_grid.css" />
    <link rel="stylesheet" type="text/css" href="../../app.css" />
    <link rel="stylesheet" type="text/css" href="../../components/ncbi-standards/hf/header.css" />
    <link rel="stylesheet" type="text/css" href="../../homepage.css" />
    <link rel="stylesheet" type="text/css" href="../../components/ncbi-standards/hf/footer.css" />
    <link rel="stylesheet" type="text/css" href="../../check_youtube/check_youtube.css" />

    <!-- for clear button on search input -->
    <link rel="stylesheet" type="text/css" href="../../components/ncbi-standards/hf/clear.css" />
    <script type="text/javascript" src="../../components/ncbi-standards/hf/clear.js"></script>

    <!-- hp-971 - img for links to ncbi from social media sites -->
    <link rel="image_src" href="//www.ncbi.nlm.nih.gov/corehtml/logo100.gif"/>

    <!-- for popular resources list -->
    <script type="text/javascript" src="/core/jig/1.14.8/js/jig.min.js"></script>

    <script type="text/javascript">
    jQuery(function () {
        jQuery.getScript("/core/alerts/alerts.js", function () {
            galert(['header:eq(0)', 'div.header', 'div.nav_and_browser', '#universal_header', 'body > *:nth-child(1)'])
        });
    });
</script>

    <style>
        .top-nav {
            display:block;
        }
        .top-nav li a { color:#000;}

        .search_bar  {
            clear:both;
            margin-top:1em;
        }

        html .ui-ncbimenu > li > a {color:#000;}
        .top-nav li a:hover {color:#000;background:none;}
        .top-nav li.popular-res-menu.selected > a {color:#000;background:none;}
        .top-nav li a.expandDown {}
        .top-nav .ui-ncbimenu li a.expandDown {background:none;padding-right:0;}
        .ui-ncbibasicmenu li:last-child, .ui-ncbibasicmenu li:last-child a {
            border-radius: 0;
        }
        .nopadding {padding:0;}
    </style>
    <script>
        jQuery(document).ready(function(){
            jQuery('.arrow-down').click(function(){jQuery('.popular-res-menu .expandDown').trigger('click');})
            jQuery('.top-nav ul.jig-ncbimenu li:not(.popular-res-menu)').addClass('no-submenu');
        });
    </script>
    <!-- end for popular resources list -->

    <!-- for HP-886 -->
    <script>
    (function($){
        $(function(){
            var $dbList = $('.search_bar form select:first-child'),
                $btn = $('.search_bar form button[name="Search"]'),
                $input = $('#search');

            console.info($btn);

            $btn.on('click', function(evt){
                var db = $dbList.val(), searchTerm = $input.val();
                if ( db != '' && searchTerm != '') {
                    window.location.href = 'https://www.ncbi.nlm.nih.gov/'+ db + '/?term=' + searchTerm
                } else if (db !== '' && searchTerm === '') {
                    window.location.href = 'https://www.ncbi.nlm.nih.gov/'+ db + '/';
                }
                else {
                    $input.focus();
                }
                return false;
            });

        });
    })(jQuery);
    </script>
    <!-- end for HP-886 -->


</head>
<body>
<div class="grid">

<header id="page_header" role="banner" data-section="header">
    
    <ul class="skip_nav">
        <li><a accesskey="1" title="NCBI Homepage" href="/">NCBI Home</a></li>
        <li><a accesskey="2" title="MyNCBI" href="/myncbi">Sign in to NCBI</a></li>
        <li><a accesskey="3" title="Skip to main content" href="#maincontent">Skip to Main Content</a></li>
        <li><a accesskey="4" title="Skip to navigation" href="#navcontent">Skip to Navigation</a></li>
        <li><a accesskey="0" title="About NCBI Accesskeys" href="/guide/browsers/#accesskeys">About NCBI Accesskeys</a></li>
    </ul>
    
    <nav class="blue_nav_bar">
        <div class="nih">
            <a href="https://www.nih.gov/" class="left norm_height">
                <img src="../../components/ncbi-standards/hf/nih_logo.svg" alt="NIH logo" class="left"/></a>
            <a href="https://www.nlm.nih.gov/" class="left header_link">U.S. National Library of Medicine</a>
        </div>
        
        <div class="left">
            <img src="../../components/ncbi-standards/hf/arrow.svg" class="left norm_height" alt=""/>
        </div>
        
        <div class="ncbi">
            <a href="/" class="header_link">
                <span class="ncbi_name">NCBI</span>
                <span class="med_hidden">National Center for Biotechnology Information</span></a>
            
            <div class="right sign-in">
                <ul class="myncbi2">
                    <li id="myncbiusername">
                        <span id="mnu">
                            <a href="/account/settings/" title="Edit account settings"/></a>
                        </span>
                    </li>
                    <li id="myncbi" style="display:none"><a accesskey="2" href="/myncbi/" >My NCBI</a></li>
                    <li id="myncbi_sign_in"><a href="/account/">Sign in to NCBI</a></li>
                    <li id="myncbi_register" style="display:none"><a href="/account/register/">Register</a></li>
                    <li id="myncbi_sign_out" style="display:none"><a href="/account/signout/"  >Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- gray header - nav & search -->
    <div class="bg-gray header-div">
        <nav class="top-nav" id="navcontent" role="navigation">
            <ul class="inline_list black_text category_bar jig-ncbimenu">
                <li><a href="/" class="uppercase">ncbi home</a></li>
                <li><a href="../../literature/" class="uppercase">literature</a></li>
                <li><a href="../../health/" class="uppercase">health</a></li>
                <li><a href="../../genomes/" class="uppercase">genomes</a></li>
                <li><a href="../../genes/" class="uppercase">genes</a></li>
                <li><a href="../../proteins/" class="uppercase">proteins</a></li>
                <li><a href="../../chemicals/" class="uppercase">chemicals</a></li>
                
                <li class="popular-res-menu">
                    <a href="#" class="uppercase">popular resources &#x25BC;</a>
                    <ul>
                        <li><a href="/pubmed/">PubMed</a></li>
                        <li><a href="/books/">Bookshelf</a></li>
                        <li><a href="/pmc/">PubMed Central</a></li>
                        <li><a href="https://blast.ncbi.nlm.nih.gov">BLAST</a></li>
                        <li><a href="/nucleotide/">Nucleotide</a></li>
                        <li><a href="/genome/">Genome</a></li>
                        <li><a href="/snp/">SNP</a></li>
                        <li><a href="/gene">Gene</a></li>
                        <li><a href="/protein/">Protein</a></li>
                        <li><a href="https://pubchem.ncbi.nlm.nih.gov">PubChem</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div class="search_bar">
            <form action="/search" method="get" role="search">
                <select id="database">
                    <!-- <optgroup label="Recent"><option value="gquery" selected="selected" class="last">All Databases</option></optgroup> -->
                    <optgroup>
                        <option value="gquery">All Databases</option>
                        <option value="assembly">Assembly</option>
                        <option value="biocollections">Biocollections</option>
                        <option value="bioproject">BioProject</option>
                        <option value="biosample">BioSample</option>
                        <option value="biosystems">BioSystems</option>
                        <option value="books">Books</option>
                        <option value="clinvar">ClinVar</option>
                        <option value="cdd">Conserved Domains</option>
                        <option value="gap">dbGaP</option>
                        <option value="dbvar">dbVar</option>
                        <option value="gene">Gene</option>
                        <option value="genome">Genome</option>
                        <option value="gds">GEO DataSets</option>
                        <option value="geoprofiles">GEO Profiles</option>
                        <option value="homologene">HomoloGene</option>
                        <option value="ipg">Identical Protein Groups</option>
                        <option value="medgen">MedGen</option>
                        <option value="mesh">MeSH</option>
                        <option value="ncbisearch">NCBI Web Site</option>
                        <option value="nlmcatalog">NLM Catalog</option>
                        <option value="nuccore">Nucleotide</option>
                        <option value="omim">OMIM</option>
                        <option value="pmc">PMC</option>
                        <option value="popset">PopSet</option>
                        <option value="probe">Probe</option>
                        <option value="protein">Protein</option>
                        <option value="proteinclusters">Protein Clusters</option>
                        <option value="pcassay">PubChem BioAssay</option>
                        <option value="pccompound">PubChem Compound</option>
                        <option value="pcsubstance">PubChem Substance</option>
                        <option value="pubmed">PubMed</option>
                        <option value="snp">SNP</option>
                        <option value="sra">SRA</option>
                        <option value="structure">Structure</option>
                        <option value="taxonomy">Taxonomy</option>
                        <option value="toolkit">ToolKit</option>
                        <option value="toolkitall">ToolKitAll</option>
                        <option value="toolkitbook">ToolKitBook</option>
                    </optgroup>
                </select>
                <label class="offscreen_noflow left" for="search">Search NCBI</label>
                <div class="searchbar_wrap">
                    <input id="search" type="search" name="term" placeholder="Search NCBI" class="search-box" autocapitalize="off" autocorrect="off" autocomplete="off"/>
                    <a id="clear" href="#" style="display:none">
                        <img src="../../components/ncbi-standards/hf/clear.png" alt="Clear input" width="14" height="14" />
                    </a>
                </div>
                <button name="Search"><img class="icon-small" src="../../images/icons/search-white.svg" aria-hidden="true" aria-hidden="true" alt="" />
                    <span class="icon-fallback-text">Search Icon</span>&nbsp; Search</button>
            </form>
        </div>
    </div>
    
</header>


    <div id="maincontent" class="action_page">
        <h1 class="gray-border large_h1">NCBI Website and Data Usage Policies and Disclaimers</h1>

        <section class="col eight_col no_border">
                <h2 id="disclaimer">Website Disclaimer</h2>
                <p><b>Liability:</b> For documents and software available from this server, the U.S. Government does not warrant or assume any legal liability or responsibility for the accuracy, completeness, or usefulness of any information, apparatus, product, or process disclosed.</p>
                <p><b>Endorsement:</b> NCBI does not endorse or recommend any commercial products, processes, or services. The views and opinions of authors expressed on NCBI's Web sites do not necessarily state or reflect those of the U.S. Government, and they may not be used for advertising or product endorsement purposes.</p>
                <p><b>External Links:</b> Some NCBI Web pages may provide links to other Internet sites for the convenience of users. NCBI is not responsible for the availability or content of these external sites, nor does NCBI endorse, warrant, or guarantee the products, services, or information described or offered at these other Internet sites. Users cannot assume that the external sites will abide by the same <a href="https://www.nlm.nih.gov/privacy.html">Privacy Policy</a> to which NCBI adheres. It is the responsibility of the user to examine the copyright and licensing restrictions of linked pages and to secure all necessary permissions.</p>
                <p><b>Pop-Up Advertisements:</b> When visiting our Web site, your Web browser may produce pop-up advertisements. These advertisements were most likely produced by other Web sites you visited or by third party software installed on your computer. The NLM does not endorse or recommend products or services for which you may view a pop-up advertisement on your computer screen while visiting our site.</p>

                <h2 id="usage">Website Usage</h2>
                <p>This site is maintained by the U.S. Government and is protected by various provisions of Title 18 of the U.S. Code. Violations of Title 18 are subject to criminal prosecution in a federal court. For site security purposes, as well as to ensure that this service remains available to all users, we use software programs to monitor traffic and to identify unauthorized attempts to upload or change information or otherwise cause damage. In the event of authorized law enforcement investigations and pursuant to any required legal process, information from these sources may be used to help identify an individual.</p>

                <h2 id="copyright">Copyright Status of Webpages</h2>
                <p>Information that is created by or for the US government on this site is within the public domain. Public domain information on the National Library of Medicine (NLM) Web pages may be freely distributed and copied. However, it is requested that in any subsequent use of this work, NLM be given appropriate acknowledgment.</p>
                <p>NOTE: This site contains resources which incorporate material contributed or licensed by individuals, companies, or organizations that may be protected by U.S. and foreign copyright laws. These include, but are not limited to PubMed Central (PMC) (see <a href="//www.ncbi.nlm.nih.gov/pmc/about/copyright/">PMC Copyright Notice</a>), Bookshelf (see <a href="//www.ncbi.nlm.nih.gov/books/about/copyright/">Bookshelf Copyright Notice</a>), OMIM (see <a href="https://omim.org/help/copyright">OMIM Copyright Status</a>), and PubChem. All persons reproducing, redistributing, or making commercial use of this information are expected to adhere to the terms and conditions asserted by the copyright holder. Transmission or reproduction of protected items beyond that allowed by <a href="https://www.copyright.gov/fls/fl102.html">fair use</a> (PDF) as defined in the copyright laws requires the written permission of the copyright owners.</p>

                <h2 id="data">Molecular Data Usage</h2>
                <p>Databases of molecular data on the NCBI Web site include such examples as nucleotide sequences (GenBank), protein sequences, macromolecular structures, molecular variation, gene expression, and mapping data. They are designed to provide and encourage access within the scientific community to sources of current and comprehensive information. Therefore, NCBI itself places no restrictions on the use or distribution of the data contained therein. Nor do we accept data when the submitter has requested restrictions on reuse or redistribution. However, some submitters of the original data (or the country of origin of such data) may claim patent, copyright, or other intellectual property rights in all or a portion of the data (that has been submitted). NCBI is not in a position to assess the validity of such claims and since there is no transfer of rights from submitters to NCBI, NCBI has no rights to transfer to a third party. Therefore, NCBI cannot provide comment or unrestricted permission concerning the use, copying, or distribution of the information contained in the molecular databases.</p>

                <h2 id="human-genomic-data">Human Genomic Data Submitted to Unrestricted-Access Repositories</h2>
                <p>If you plan to submit large-scale human genomic data, as defined by the <a href="https://osp.od.nih.gov/scientific-sharing/genomic-data-sharing/">NIH Genomic Data Sharing (GDS) Policy</a>, to be maintained in an unrestricted-access NCBI database, NIH expects you to 1) submit an <a href="http://osp.od.nih.gov/scientific-sharing/institutional-certifications/">Institutional Certification</a> to assure that the data submission and expectations defined in the NIH GDS Policy have been met, 2) register the study in NCBI <a href="/bioproject/">BioProject</a> regardless of where the data will ultimately reside (e.g., GenBank, SRA, GEO). If you have any questions about whether your research is subject to the NIH GDS Policy, please contact the relevant NIH Program Official and/or the <a href="https://osp.od.nih.gov/wp-content/uploads/IC_GPAs.pdf">Genomic Program Administrator</a>.</p>
                <p>If you plan to submit genomic data from human specimens that would not be considered large-scale, it is your responsibility to ensure that the submitted information does not compromise participant privacy and is in accord with the original consent in addition to all applicable laws, regulations, and institutional policies.</p>

                <h2 id="browsers">Use of Web Browsers</h2>
                <p>The NCBI web site supports the current release of Chrome, Firefox, Safari, and Edge, and the previous two versions. It also supports IE11 and newer versions. "Supports" means that NCBI will actively work to identify and fix bugs.  For advice on how to adjust web browser parameters to optimize use and accessibility of the NCBI website, please see <a href="//www.ncbi.nlm.nih.gov/guide/browsers/">Browser Advice</a> for NCBI Web Pages.</p>

                <h2 id="accessibility">Accessibility Policy</h2>
                <p>As a Center within the National Library of Medicine (NLM), the NCBI is making every effort to ensure that the information available on our Web site is accessible to all. Please see the <a href="https://www.nlm.nih.gov/accessibility.html">NLM's Accessibility Policy</a>, for more information.</p>

                <h2 id="privacy">Privacy Policy</h2>
                <p>The NCBI provides this Web site as a public service. As a Center within the NLM, we do not collect any personally identifiable information (PII) about visitors to our Web sites. We do collect some data about user visits to help us better understand how the public uses the site and how to make it more helpful. The NCBI does not collect information for commercial marketing or any purpose unrelated to <a href="../../about/mission/">NCBI's Mission</a>. For more information, please see the <a href="https://www.nlm.nih.gov/privacy.html">NLM Privacy Policy</a>.</p>

                <h2 id="medical">Medical Information and Advice Disclaimer</h2>
                <p>It is not the intention of NLM to provide specific medical advice but rather to provide users with information to better understand their health and their diagnosed disorders. Specific medical advice will not be provided, and NLM urges you to consult with a qualified physician for diagnosis and for answers to your personal questions.</p>

                <h2 id="scripting">Guidelines for Scripting Calls to NCBI Servers</h2>
                <p>Do not overload NCBI's systems. Users intending to send numerous queries and/or retrieve large numbers of records should comply with the following:
                <ul class="bullet-list">
                    <li>Run retrieval scripts on weekends or between 9 pm and 5 am Eastern Time weekdays for any series of more than 100 requests.</li>
                    <li>Send E-utilities requests to <a href="//www.ncbi.nlm.nih.gov/books/NBK25501/">https://eutils.ncbi.nlm.nih.gov</a>, not the standard NCBI Web address.</li>
                    <li>Make no more than 3 requests every 1 second.</li>
                    <li>Use the URL parameter email, and tool for distributed software, so that we can track your project and contact you if there is a problem. For more information, please see the <a href="//www.ncbi.nlm.nih.gov/books/NBK25497/#_chapter2_Usage_Guidelines_and_Requiremen_">Usage Guidelines and Requirements section</a> in the <a href="//www.ncbi.nlm.nih.gov/books/NBK25501/">Entrez Programming Utilities Help Manual</a>.</li>
                    <li>NCBI's Disclaimer and Copyright notice must be evident to users of your service.  NLM does not claim the <a href="https://www.nlm.nih.gov/databases/download.html">copyright on the abstracts in PubMed</a>; however, journal publishers or authors may. NLM provides no legal advice concerning distribution of copyrighted materials, consult your legal counsel.</li>
                </ul></p>
            </section>

            <section class="col four_col border">
                <h4>CONTENTS</h4>
                <ul class="actionpg_ul">
                    <li><a href="#disclaimer">Website Disclaimer</a></li>
                    <li><a href="#usage">Website Usage</a></li>
                    <li><a href="#copyright">Copyright Status of Webpages</a></li>
                    <li><a href="#data">Molecular Data Usage</a></li>
                    <li><a href="#browsers">Use of Web Browsers</a></li>
                    <li><a href="#accessibility">Accessibility Policy</a></li>
                    <li><a href="#privacy">Privacy Policy</a></li>
                    <li><a href="#medical">Medical Information and Advice Disclaimer</a></li>
                    <li><a href="#scripting">Guidelines for Scripting Calls to NCBI Servers</a></li>
                </ul>
            </section>

    </div>

    <footer id="page_footer" data-section="footer">
        <div class="foot_wrap">
<!-- top section of footer w link lists -->

            <div class="col two_col">
            <h3 role="heading" aria-level="3">NCBI</h3>
            <ul>
                <li><a href="../../about/">About NCBI</a></li>
                <li><a href="../../submit/">Submit</a></li>
                <li><a href="../../download/">Download</a></li>
                <li><a href="../../learn/">Learn</a></li>
                <li><a href="../../develop/">Develop</a></li>
                <li><a href="../../analyze/">Analyze</a></li>
                <li><a href="/research/">Research</a></li>
                <li><a href="https://ncbiinsights.ncbi.nlm.nih.gov/">NCBI News &amp; Blog</a></li>
                <li><a href="/guide/sitemap/">Resource List (A-Z)</a></li>
            </ul>

            </div>

            <div class="col two_col">
            <h3 role="heading" aria-level="3">Literature</h3>
            <ul>
                <li><a href="/pubmed/">PubMed</a></li>
                <li><a href="/pmc/">PMC</a></li>
                <li><a href="/books/">Books</a></li>
                <li><a href="/nlmcatalog/">NLM Catalog</a></li>
            </ul>

            <h3 role="heading" aria-level="3">Health</h3>
            <ul>
                <li><a href="/medgen/">MedGen</a></li>
                <li><a href="/gtr/">GTR</a></li>
                <li><a href="/clinvar/">ClinVar</a></li>
                <li><a href="/gap/">dbGap</a></li>
            </ul>
            </div>

            <div class="col two_col">
            <h3 role="heading" aria-level="3">Genomes</h3>
            <ul>
                <li><a href="/genome">Genome</a></li>
                <li><a href="/nucleotide">Nucleotide</a></li>
                <li><a href="/sra">SRA</a></li>
                <li><a href="/assembly">Assembly</a></li>
                <li><a href="/snp">dbSNP</a></li>
                <li><a href="/dbvar">dbVar</a></li>
                <li><a href="/geo/">GEO</a></li>
            </ul>
            </div>

            <div class="col two_col">
            <h3 role="heading" aria-level="3">Genes</h3>
            <ul>
                <li><a href="/gene/">Gene</a></li>
                <li><a href="/nucleotide/">Nucleotide</a></li>
                <li><a href="/genbank/">GenBank</a></li>
                <li><a href="/refseq/">RefSeq</a></li>
                <li><a href="/genbank/tpa">TPA</a></li>
                <li><a href="/geo/">GEO</a></li>
                <li><a href="/homologene">HomoloGene</a></li>
                <li><a href="/biosystems">BioSystems</a></li>
            </ul>
            </div>

            <div class="col two_col">
            <h3 role="heading" aria-level="3">Proteins</h3>
            <ul>
                <li><a href="/protein/">Protein</a></li>
                <li><a href="/refseq/">RefSeq</a></li>
                <li><a href="/genbank/tpa">TPA</a></li>
                <li><a href="/homologene">HomoloGene</a></li>
                <li><a href="/cdd">CDD</a></li>
                <li><a href="/proteinclusters">Protein Clusters</a></li>
                <li><a href="/structure">Structure</a></li>
                <li><a href="/pcassay">PubChem BioAssay</a></li>
                <li><a href="/biosystems">BioSystems</a></li>
            </ul>
            </div>

            <div class="col two_col">
            <h3 role="heading" aria-level="3">Chemicals</h3>
            <ul>
                <li><a href="https://pubchem.ncbi.nlm.nih.gov/">PubChem</a></li>
                <li><a href="/pcassay">BioAssay</a></li>
                <li><a href="/pcsubstance">Substance</a></li>
                <li><a href="/pccompound">Compound</a></li>
                <li><a href="/biosystems">BioSystems</a></li>
            </ul>
            </div>

<!-- social media -->
            <div class="col two_col social">
            <h3 role="heading" aria-level="3">Social</h3>
            <ul class="social_media">
				<li><a href="https://www.facebook.com/ncbi.nlm"><img class="icon-medium gray-medium" src="../../images/icons/facebook.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">Facebook</span></a></li>
				<li><a href="https://www.twitter.com/ncbi"><img class="icon-medium gray-medium" src="../../images/icons/twitter.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">Twitter</span></a></li>
				<li><a href="https://plus.google.com/s/ncbi"><img class="icon-medium gray-medium" src="../../images/icons/google-plus.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">Google+</span></a></li>
				<li><a href="https://www.linkedin.com/company/national-center-for-biotechnology-information-ncbi-"><img class="icon-medium gray-medium" src="../../images/icons/linkedin.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">LinkedIn</span></a></li>
				<li><a href="https://www.youtube.com/ncbinlm"><img class="icon-medium gray-medium" src="../../images/icons/youtube.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">YouTube</span></a></li>
				<li><a href="https://github.com/ncbi"><img class="icon-medium gray-medium" src="../../images/icons/github.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">GitHub</span></a></li>
				<li><a href="https://ncbiinsights.ncbi.nlm.nih.gov/ncbi-rss-feeds-listservs/"><img class="icon-medium gray-medium" src="../../images/icons/rss.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">RSS Updates</span></a></li>
				<li><a href="https://ncbiinsights.ncbi.nlm.nih.gov/ncbi-rss-feeds-listservs/"><img class="icon-medium gray-medium" src="../../images/icons/email.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">Email Updates</span></a></li>
				<li><a href="https://ncbiinsights.ncbi.nlm.nih.gov/"><img class="icon-medium gray-medium" src="../../images/icons/blog.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">NCBI Blog</span></a></li>
            </ul>
            </div>
            <a class="help_desk right" target="_blank" href="https://support.ncbi.nlm.nih.gov/ics/support/default.asp?style=classic&deptID=28049">Support Center</a>

        </div>

<!-- bottom section of footer -->
        <div role="contentinfo">
            <ul class="right inline_list logos">
                <li><a href="https://www.nlm.nih.gov"><img class="gray-medium" src="../../images/icons/nlm-logo.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">National Library Of Medicine</span></a></li>
                <li><a href="https://www.nih.gov"><img class="gray-medium" src="../../images/icons/nih-logo.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">National Institutes Of Health</span></a></li>
                <li><a href="https://www.hhs.gov"><img class="gray-medium" src="../../images/icons/hhs-logo.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">U.S. Department of Health & Human Services</span></a></li>
                <li><a href="https://www.usa.gov"><img class="icon-large-wide gray-medium" src="../../images/icons/usagov-logo.svg" aria-hidden="true" alt="" /><span class="icon-fallback-text">USA.gov</span></a></li>
            </ul>

            <div class="footer_padding">

            <div class="footer_border h-card">

                <a href="/" class="u-url"><h3 role="heading" aria-level="3" class="ncbi_blue p-org">NCBI</h3></a>

                <address>

                <a href="/" class="u-url p-org">National Center for Biotechnology Information,</a><a href="https://www.nlm.nih.gov/"> U.S. National Library of Medicine</a>

                <span class="h-adr">
                <span class="p-street-address">8600 Rockville Pike</span>,
                <span class="p-locality">Bethesda</span>
                <span class="p-region"> MD</span>,
                <span class="p-postal-code">20894</span>
                <span class="p-country-name">USA</span>
                </span>

                </address>

            </div>

            <div class="inline_list about_list">
                <a href="../../about/policies.shtml">Polices and Guidelines</a>
                |
                <a href="../../about/contact.shtml">Contact</a>
            </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="../../hp.js"> </script>
    <script type="text/javascript" src="../../components/ncbi-standards/hf/header.js"> </script>
    <script type="text/javascript" src="../../check_youtube/check_youtube.js"> </script>
    <script type="text/javascript" src="/portal/portal3rc.fcgi/rlib/js/InstrumentNCBIBaseJS/InstrumentPageStarterJS.js"> </script>


</div>
</body>
</html>
