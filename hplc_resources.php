<?php
    $local_root = 'http://' . $_SERVER['SERVER_NAME'];
    $selected_tab = 2;
    $tab_title = "HPLC Resources";
    include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
  </head>
  <body>
	<main>
    <div class="hplc-resources">
      <h1 id="page-title">Welcome!</h1>
      <hr>
      <p> This page is an outcome of an informal survey I made of several HPLC
        experts in preparation for an article I wrote for <i>LCGC Magazine</i>
        in 2017. The intention here is to collect a number of (mostly free)
        resources that users of liquid chromatography find very useful in their
        work on HPLC. If you know of an resource that you think is particularly
        useful but not listed here, I'd be happy to know about it. Please feel
        free to email me with suggestions.<br>
        &nbsp;&nbsp;&nbsp; ~ Dwight R. Stoll (updated October, 2017) </p>
      <div id="content">
        <table cellspacing="2" cellpadding="2">
          <tbody>
            <tr class="table-header" style="color: rgb(213, 213, 213);">
              <td>Resources, Broadly Defined</td>
              <td>Tutorials, Primers, and Guides</td>
              <td>Tools for LC Simulation and Calculation</td>
            </tr>
            <tr class="table-content">
              <td>
                <ul>
                  <li> <a href="http://www.chromatographyonline.com" target="_blank"><b>LCGC
                        Website</b></a> - Great free resource for all aspects of
                    separation science </li>
                  <li> <b><a href="http://www.lcresources.com/training/tsbible.html"
                        target="_blank">John Dolan's LC Troubleshooting Bible</a></b>
                    - All of Dolan's LC Troubleshooting articles, searchable by
                    keyword </li>
                  <li> List of <a href="https://www.lcresources.com/training/LCR-resources.html"
                      target="_blank"><b>miscellaneous resources</b></a> curated
                    by <i>LC Resources</i> </li>
                  <li> <a href="http://www.asdlib.org" target="_blank"><b>Analytical
                        Sciences Digital Library</b></a> - Collection of
                    resources developed with funding from the U.S. National
                    Science Foundation </li>
                  <li><b><a href="http://www.agilent.com/en-us/promotions/academia-resources"
                        target="_blank">Agilent Teaching Resources for Academia</a></b>
                    - Collection of videos and animations demonstrating the
                    principles of various LC and MS approaches </li>
                </ul>
              </td>
              <td>
                <ul>
                  <li><b><a href="http://www.chromacademy.com" target="_blank">CHROMAcademy</a></b>
                    - Full learning management system of &gt;1000 animated and
                    video training courses, with customizable learning paths,
                    and online troubleshooting tools, in chromatography, sample
                    preparation, mass spectrometry, spectroscopy and basic
                    laboratory skills. Constantly updated.</li>
                  <li><b><a href="http://www.chromedia.org" target="_blank">Chromedia</a></b>
                    - Multimedia learning resources for sample preparation,
                    chromatography, and mass spectrometry.</li>
                  <li><b>Primers by Agilent</b></li>
                  <li>
                    <ul class="secondary-list">
                      <li><a href="http://www.agilent.com/en-us/library/literature?N=159"
                          target="_blank">List of all Primers</a> </li>
                      <li><a href="https://www.agilent.com/cs/library/primers/Public/LC-Handbook-Complete-2.pdf"
                          target="_blank">Introduction to Liquid Chromatography</a></li>
                      <li><a href="http://www.reolgrade.ru/docs/documents/news/2017-04-21/5991-2359EN.pdf"
                          target="_blank">Two-Dimensional Liquid Chromatography</a>
                      </li>
                    </ul>
                  </li>
                  <li><b>Primers by Waters</b></li>
                  <li>
                    <ul class="secondary-list">
                      <li> <a href="http://www.waters.com/waters/en_US/Primers/nav.htm?locale=en_US&amp;cid=10048920"
                          target="_blank">List of all Primers</a> </li>
                      <li> <a href="http://www.waters.com/waters/en_US/HPLC---High-Performance-Liquid-Chromatography-Explained/nav.htm?locale=en_US&amp;cid=10048919"
                          target="_blank">Beginners Guide to HPLC</a> </li>
                    </ul>
                  </li>
                  <li> <b><a href="http://www.youtube.com/watch?v=kz_egMtdnL4"
                        target="_blank">Introductory Video about HPLC</a></b> -
                    Produced by the Royal Society of Chemistry, captures in 5
                    minutes the essence of how HPLC works and why it is so
                    useful. </li>
                  <li> <b><a href="http://www.sigmaaldrich.com/analytical-chromatography/chiral-chromatography.html"
                        target="_blank">Supelco Resources for Chiral
                        Chromatography</a></b> - multimedia learning resources
                    for chiral separations </li>
                </ul>
              </td>
              <td>
                <ul>
                  <li><b>HPLC Simulator</b> (www.multidlc.org/hplcsim/hplcsim.html) - Dynamic
                    simulator for exploring the effects of operating variables
                    on reversed-phase separations - Developed at Gustavus Adolphus College</li>
                  <li>
                    <ul class="secondary-list">
                      <li> <a href="http://www.multidlc.org/hplcsim/hplcsim.html" target="_blanks">Web
                          application</a> (free) </li>
                    </ul>
                  </li>
                  <li><b>HPLC Simulator</b> - More detailed simulator compared
                    to hplcsim.html - Developed at U. Geneva </li>
                  <li>
                    <ul class="secondary-list">
                      <li> <a href="https://epgl.unige.ch/labs/fanal/hplc-calculator"
                          target="_blanks">Excel spreadsheet</a> (free) </li>
                    </ul>
                  </li>
                  <li> <b>HPLC Teaching Assistant</b> - Calculators to
                    facilitate teaching and learning about HPLC concepts -
                    Developed at U. Geneva </li>
                  <li>
                    <ul class="secondary-list">
                      <li><a href="https://epgl.unige.ch/labs/fanal/hplc-teaching-assistant"
                          target="_blank">Excel spreadsheet</a> (free) </li>
                    </ul>
                  </li>
                  <li><b>Calculator Apps for Parameter Estimation </b>(e.g.,
                    pressure vs. flow rate)</li>
                  <li>
                    <ul class="secondary-list">
                      <li>Agilent (free) (<a href="http://www.agilent.com/en-us/products/liquid-chromatography/lccalcweb"
                          target="_blank">web</a>, <a href="https://itunes.apple.com/us/app/lc-calculator/id355827606?mt=8"
                          target="_blank">iOS</a>) </li>
                    </ul>
                  </li>
                  <li><b>Method Transfer Tools </b>- Calculators for scaling to
                    different particle sizes, movement between instruments, etc.</li>
                  <li>
                    <ul class="secondary-list">
                      <li class="indent">Thermo <a href="https://www.thermofisher.com/content/.../RSLC-Method-Transfer-Tool-2-3.xlsm"
                          target="_blank"> Excel spreadsheet</a> (free)</li>
                      <li class="indent">Waters<a href="http://www.waters.com/waters/support.htm?lid=134891632"
                          target="_blank"> Desktop application</a> (free) </li>
                    </ul>
                  </li>
                  <li><a href="https://www.zirchrom.com/Pass.asp" target="_blank"><b>Buffer
                        Wizard</b></a> - Web-based application designed to
                    assist with calculations needed for preparing buffers (free
                    and paid versions available) </li>
                </ul>
              </td>
            </tr>
            <tr class="table-header" style="color: rgb(213, 213, 213);">
              <td>Wall Charts and Quick-Start Guides</td>
              <td>Tools for Column Selection and Characterization</td>
              <td>Tools for Molecular Properties</td>
            </tr>
            <tr class="table-content">
              <td>
                <ul>
                  <li>LCGC's <a href="http://www.chromatographyonline.com/lcgc-ebooks-10-01-2016"
                      target="_blank">Sample Preparation Guide</a></li>
                  <li>LCGC's <a href="http://www.chromatographyonline.com/lcgc-ebooks-05-01-2017"
                      target="_blank">LC Troubleshooting Guide</a></li>
                </ul>
              </td>
              <td>
                <ul>
                  <li><a href="http://www.usp.org/resources/pqri-approach-column-equiv-tool"
                      target="_blank"><b>PQRI Website</b></a> - Database of
                    column parameters based on the Hydrophobic Subtraction (HS)
                    model developed by Snyder, Dolan, and coworkers - maintained
                    by United States Pharmacopoeia </li>
                  <li> <a href="http://www.hplccolumns.org/" target="_blank"><b>hplccolumns.org</b></a>
                    - Database of column parameters based on HS model, presented
                    in a different way compared to USP PQRI site, and with
                    unique tools for visualization - maintained by Stoll
                    Laboratory</li>
                  <li><b><a href="www.waters.com/waters/promotionDetail.htm?id=10048475&amp;locale=en_CA"
                        target="_blank">Waters RP Column Selectivity Chart</a></b>&nbsp;
                    - Tool for comparing selectivities of different RP
                    chemistries, and columns from different vendors</li>
                  <li><b><a href="http://www.icoa.fr/classification_c18_columns/index.php"
                        target="_blank">ICOA Website</a></b> - Classification
                    tool for RP phases developed at Institut de Chimie Organique
                    et Analytique </li>
                </ul>
              </td>
              <td>
                <ul>
                  <li> <a href="http://www.chemspider.com/" target="_blank"><b>ChemSpider</b>
                    </a>- Free chemical structure database providing access to
                    millions of structures from hundreds of data sources.
                    Enables predication of properties including pKa and log P
                    using a number of different algorithms</li>
                  <li><b><a href="http://webbook.nist.gov/" target="_blank">NIST
                        WebBook</a></b> - Free access to physical and chemical
                    property data compiled by U.S. National Institute of
                    Standards and Technology (NIST) </li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
	</main>
    <?php   include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?></body>
</html>
