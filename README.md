grima
=======

Welcome to Grima, the library that makes it easy to work with Alma
using APIs. This library is an expanded version of the origianl Grima found [here](https://github.com/zemkat/grima) which has been modified for use at Davidson. 
It's main use is to expedite the process of viewing and editing data in bib, holding, and item records in Alma as this can be an excesively convoluted process in base Alma. 

# Installation

The easiest way to use this package is on a single computer. This can be done on Windows, Macs, and any Linux distro. For Linux, follow the instruction for Windows 10 once the Windows Subsytem for Linux has been installed. Depending on the pacakge manager the commands may need to be slightly different.
<ol>
<li> Setup Linux subsystem: (For Windows 10) </li>
  <ol>
  <li> Search “Turn Windows Features on” in search bar </li>
  <li> Check Windows Subsystem for Linux </li>
  <li> Click ok, let WSL install, and reboot </li>
  <li> Open Windows store </li>
  <li> Search ubuntu and install Ubuntu 18.04 LTS </li>
  <li> Open and wait a while </li>
  <li> Create a username and password </li>
  </ol>
<li> Setup homebrew for mac: (For Macs) </li>
  <ol>
  <li> Open terminal </li>
  <li> xcode-select --install </li>
    <ol>
     <li> Click install on the box which pops up </li>
     <li> This will take a while </li>
      </ol>
  <li> ruby -e "$(curl -fsSL </li>
https://raw.githubusercontent.com/Homebrew/install/master/install)"
  <li> brew doctor </li>
  </ol>
<li> Install necessary packages (Windows 10) </li>
  <ol>
  <li> sudo apt-get update </li>
  <li> sudo apt-get install php-xml php-sqlite3 php-curl php git </li>
  <li> git clone https://github.com/brkronheim/grima.git </li>
  <li> Type ‘cd grima’ and press enter </li>
  <li> Type ‘echo "export PATH=\$PATH:$(pwd)" >> ~/.bashrc’ </li>
  <li> Restart Ubuntu </li>
  </ol>
<li> Install necessary packages (Mac) </li>
  <ol>
  <li> brew install php </li>
    <ol>
    <li> This will take a while </li>
    </ol>
  <li> brew install git </li>
  <li> sudo nano /etc/paths </li>
  <li> Add “/Users/username” where username is your login username for the computer (i.e.
brkronheim) </li>
  <li> Press Ctrl-X (actually control, not command) </li>
  <li> Press y to save </li>
  <li> Restart terminal </li>
    </ol>
<li> How to run: </li>
  <ol>
  <li> Open Ubuntu or terminal </li>
  <li> Type ‘cd grima’ and press enter </li>
  <li> Type ‘standalone.sh’ and press enter </li>
  <li> Open web browser to ‘http://localhost:32900/’ as requested </li>
  <li> Find the ‘Edit item records’ menu on the page, these are the four options you will
probably use the most </li>
  <li> The first time you use one it will have you set up an account. The most important thing </li>
is the api key.
  </ol>
</ol>


# Functionality

The remaineder of this readme is a listing of all the Grimas and what they can do.

<h2 id="tiem-records">Item Records</h2>
<ul>
	<li><h3 id="view-item-records">View Item Record Data</h3></li>
	<ul>
		<li><a href="grimas/ViewItemRecord/ViewItemRecord.php">ViewItemRecord</a> – display contents of an item record</li>
		<li><a href="grimas/ShowItemsFromHoldings/ShowItemsFromHoldings.php">ShowItemsFromHoldings</a> – display all items from a holding record</li>
		<li><a href="grimas/ViewXmlItemBarcode/ViewXmlItemBarcode.php">View Xml Item Barcode</a> – view Item record as Item object XML using barcode as identifier</li>
		<li><a href="grimas/ViewXmlItem/ViewXmlItem.php">ViewXmlItem</a> – view Item record as Item object XML</li>
		<li><a href="grimas/ViewInternalNote/ViewInternalNote.php">View Internal Note</a> – view any internal note of the item</li>
	</ul>
	<li><h3 id="edit-item-records">Edit Item Record Data</h3></li>
	<ul>
		<li><a href="grimas/ChangeLocation/ChangeLocation.php">Change Location</a> – change the location of the item</li>
		<li><a href="grimas/ChangeStorageLocationID/ChangeStorageLocationID.php">Change Storage Location ID</a> – change the storage location ID for the item</li>
		<li><a href="grimas/ChangeInternalNote/ChangeInternalNote.php">Change Internal Note</a> – change any internal note of the item</li>
		<li><a href="grimas/RemoveTempLocation/RemoveTempLocation.php">RemoveTempLocation</a> – remove temporary location from item</li>
		<li><a href="grimas/AddInternalNote/AddInternalNote.php">AddInternalNote</a> – add internal note 1 to an item record</li>
		<li><a href="grimas/MarkImportTemporaryLocation/MarkImportTemporaryLocation.php">MarkImportTemporaryLocation</a> – mark items from an import job as being in a temporary location</li>
	</ul>
	<li><h3 id="add-item-records">Add Items</h3></li>
	<ul>
		<li><a href="html/AddItems.html">AddNewItemRecord</a> – Method selection screen</li>
		<li><a href="grimas/AddNewItemRecord/AddNewItemRecord.php">AddItemFromHoldingId</a> – add a new custom item record from mmsid and holding id</li>
		<li><a href="grimas/AddItemFromBarcode/AddItemFromBarcode.php">AddItemFromBarcode</a> – add a new custom item record to holding record shared by a barcode</li>
		<li><a href="grimas/AddItemFromMMSID/AddItemFromMMSID.php">AddItemFromMMSID</a> – add a new custom item record to bib record determined by mms id</li>
		<li><a href="grimas/MoreItems/MoreItems.php">AddSerialItems</a> – add more items to a serial or set, based on the first one</li>
	</ul>
	<li><h3 id="delete-item-records">Delete Items</h3></li>
	<ul>
		<li><a href="grimas/DeleteItem/DeleteItem.php">DeleteItem</a> – delete item from Alma</li>
	</ul>
</ul>


<h2 id="holdings">Holdings</h2>
<ul>
	<li><h3 id="view-holdings-records">View Holding Data</h3></li>
	<ul>
		<li><a href="grimas/PrintHolding/PrintHolding.php">PrintHolding</a> – display holding record in printable web page</li>
		<li><a href="grimas/PrintHoldingsFromBarcode/PrintHoldingsFromBarcode.php">PrintHoldingsFromBarcode</a> - display holding record in printable web page using barcode as identifier</li>
		<li><a href="grimas/ViewXmlHolding/ViewXmlHolding.php">ViewXmlHolding</a> – view Holding record as Holding object XML</li>
	</ul>
	<li><h3 id="edit-holdings-records">Edit Holding Data</h3></li>
	<ul>
		<li><a href="grimas/ChangeCallNumberClassification/ChangeCallNumberClassification.php">ChangeCallNumberClassification</a> - change the classification of a call number</li>
		<li><a href="html/MarcHolding.html">AddHoldingMarcFields</a> – add new Holding MARC fields</li>
		<li><a href="grimas/AddHoldingMarcFields/AddHoldingMarcFields.php">AddFieldFromHoldingId</a> – add new Holding MARC fields from mmsid and holding id</li>
		<li><a href="grimas/AddHoldingMarcFieldsBarcode/AddHoldingMarcFieldsBarcode.php">AddFieldFromBarcode</a> – add new Holding MARC fields to holding record of a barcode</li>
		<li><a href="grimas/AddHoldingMarcFieldsMMS/AddHoldingMarcFieldsMMS.php">AddFieldFromMMSID</a> – add new Holding MARC fields to a holding from the bib record determined by mms id</li>
		<li><a href="html/ChangeCallNumber.html">ChangeCallNumber</a> – change call number selection screen</li>
	</ul>
	
  <li><h3 id="delete-holdings-records">Delete Holding</h3></li>
	<ul>
		<li><a href="grimas/DeleteHolding/DeleteHolding.php">DeleteHolding</a> – delete holding from Alma with mmsID and holdingID</li>
		<li><a href="grimas/DeleteHoldingMMS/DeleteHoldingMMS.php">DeleteHoldingMMSID</a> – delete holding from Alma through mmsID</li>
	</ul>
</ul>

<h2 id="bib-records">Bib Records</h2>
<ul>
	<li><h3 id="view-bib-records">View Bib Data</h3></li>
	<ul>
		<li><a href="grimas/PrintBib/PrintBib.php">PrintBib</a> – display bib record in printable web page</li>
		<li><a href="grimas/ViewXmlBib/ViewXmlBib.php">ViewXmlBib</a> – view Bib record as Bib object XML</li>
	</ul>
	<li><h3 id="edit-bib-records">Edit Bib Data</h3></li>
	<ul>
		<li><a href="grimas/InsertOclcNo/InsertOclcNo.php">InsertOclcNo</a> – insert OCLC number into 035</li>
		<li><a href="grimas/AddBibMarcFields/AddBibMarcFields.php">AddBibMarcFields</a> – add new Bib MARC fields</li>
	</ul>
	<li><h3 id="add-bib-records">Add Bibs</h3></li>
	<ul>
		<li><a href="grimas/CreateBriefBib/CreateBriefBib.php">CreateBriefBib</a> – create a brief bib with specified 245a</li>
		<li><a href="grimas/DuplicateBib/DuplicateBib.php">DuplicateBib</a> – create a duplicate copy of a bib</li>
	</ul>
	<li><h3 id="delete-bib-records">Delete Bibs</h3></li>
	<ul>
		<li><a href="grimas/DeleteBib/DeleteBib.php">DeleteBib</a> – delete bib from Alma</li>
	</ul>
</ul>

<h2 id="Misc-records">Misc Records</h2>
<ul>
	<li><h3 id="view-misc-records">View Misc Data</h3></li>
	<ul>
		<li><a href="grimas/Hierarchy/Hierarchy.php">Hierarchy</a> – view bib/mfhds/items in hierarchy view</li>
		<li><a href="grimas/ResolveLink/ResolveLink.php">ResolveLink</a> – resolve a link in Alma/Primo window</li>
		<li><a href="grimas/ViewXmlPortfolio/ViewXmlPortfolio.php">ViewXmlPortfolio</a> – view Portfolio record as Electronic Portfolio object XML</li>
	</ul>
	<li><h3 id="edit-misc-records">Edit Misc Data</h3></li>
	<ul>
		<li><a href="grimas/Boundwith/Boundwith.php">Boundwith</a> – create boundwith in Alma using bib 501/774, holding 014</li>
		<li><a href="grimas/AppendToNoteOnSet/AppendToNoteOnSet.php">AppendToNoteOnSet</a> – add a note to every item in a set, appending if there is already a note there</li>
	</ul>
	<li><h3 id="delete-misc-records">Delete Misc</h3></li>
	<ul>
		<li><a href="grimas/DeleteTree/DeleteTree.php">DeleteTree</a> – delete bib and all of its inventory from Alma</li>
		<li><a href="grimas/DeletePortfolio/DeletePortfolio.php">DeletePortfolio</a> – delete portfolio from Alma</li>
	</ul>
</ul>
