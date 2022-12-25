BEGIN {

	print "<?php";
	print "include(\"config.php\");";
	print "include(\"database.php\");";
	print "";
	primaryKeyColumns = "";
	properties = "";
	constructor = "";
	getters = "";
	setters = "";
	createTableColumns = "";
	readTableColumns = "";
	isPipe = 0;
	whereClauseColumns = "";
	writeTableColumns = "";
	readTable = "";
	writeTable1 = "";
	writeTable2 = "";
}

{
	if (NR == 1) {
		n = split ($0, cName, " ");
		
		print "class " cName[2] " {\n"

		for (i = 3; i <= n; i++) {
			if (i == 3) {
				primaryKeyColumns = cName[i];
				whereClauseColumns = cName[i] " = '\" \. \$" cName[i];
			} else {
				if (cName[i] != "|") {
					primaryKeyColumns = primaryKeyColumns ", " cName[i];
					if (isPipe == 0) {
						whereClauseColumns = whereClauseColumns " \. \"' and " cName[i] " = '\" \. \$" cName[i];
					}
				} else {
					isPipe = 1;
				}
			}
		}
	
		whereClauseColumns = whereClauseColumns " \. \"'\"";

		constructor = constructor "\t" "public function __construct () {\n";
		constructor = constructor "\t" "}\n";
	} else {
		if ($1 == "" || $1 == "\/\/") {
			properties = properties "\t" $0 "\n";

		} else {
			properties = properties "\t" "private $" $1 ";\n";
			readTable = readTable "\t\t\t\$this->" $1 " = \$result[0][\'" $1 "\'];\n";

			getters = getters "\tpublic function get_" $1 "() {\n";
			getters = getters "\t\treturn $this->" $1 ";\n";
			getters = getters "\t}\n\n";

			setters = setters "\tpublic function set_" $1 "($" $1 ") {\n"
			setters = setters "\t\t$this->" $1 " = $" $1 ";\n";
			setters = setters "\t}\n\n";
			
			if (createTableColumns == "") {
				createTableColumns = "\t\t\t" $0;
				writeTable1 = writeTable1 $1;
				#if (($3 == "NULL") && ($2 == "INT" || $2 == "BOOLEAN"))
				#	writeTable2 = writeTable2 "\'\. \$this->" $1 " \.\'";
				#else
					writeTable2 = writeTable2 "\"\' \. \$this->" $1 " \. \'\"";
			} else {
				createTableColumns = createTableColumns ",\n\t\t\t" $0;
				writeTable1 = writeTable1 ", " $1;
				#if (($3 == "NULL") && ($2 == "INT" || $2 == "BOOLEAN"))
				#	writeTable2 = writeTable2 ",\'\. \$this->" $1 " \.\'";
				#else
					writeTable2 = writeTable2 ",\"\' \. \$this->" $1 " \. \'\"";
			}
			
			if (readTableColumns == "") {
				readTableColumns = "\t\t\t\$this->teamNumber = \$result[0][\'" $1 "\'];";
			} else {
				readTableColumns = readTableColumns ",\t\t\t\$this->teamNumber = \$result[0][\'" $1 "\'];";
			}

			if (writeTableColumns == "") {
				writeTableColumns = "\t\t\t" $0;
			} else {
				writeTableColumns = writeTableColumns ",\n\t\t\t" $0;
			}
		}
	}
}

END {
	print properties;
	print "\n\t" "\/\/ Default Constructor";
	print constructor
	print "\t// Getter function for each class property";
	print getters;
	print "\t// Setter function for each class property";
	print setters;

	# Create Table
	print "\n\t\/\/ Create Table";
	print "\tpublic static function create" cName[2] "Table() {";
	print "\t\tglobal \$dbnane;";
	print "\t\tglobal $" tolower(cName[2]) "Table;";
	print "\t\t$queryString = \"CREATE TABLE \" . \$dbname . \".\" . \$" tolower(cName[2]) "Table . \" (";
	if (primaryKeyColumns == ""){
		print createTableColumns;
	} else {
		print createTableColumns ",\n\t\t\tPRIMARY KEY (" primaryKeyColumns ")";
	}
	print "\t\t)\";";
	print "\t\t\$result = DataBase::runQuery(\$queryString);";
	print "\t}";
	
	# Read from Table
	print "\n\t\/\/ Read from Table";
	if (cName[4] == "") {
		print "\tpublic function read" cName[2] "Data(\$" cName[3] ") {";
	} else {
		print "\tpublic function read" cName[2] "Data(\$" cName[3] ", \$" cName[4] ") {";
	}
	print "\t\tglobal \$" tolower(cName[2]) "Table;";
	#print "\t\t\$queryString = \"SELECT \* FROM `\" \. \$" tolower(cName[2]) "Table \. \"` WHERE " cName[3] " = '\" \. \$" cName[3] "' \. \" and " cName[4] " = '\" \. \$" cName[4] "' \. \"\";";
	print "\t\t\$queryString = \"SELECT \* FROM `\" \. \$" tolower(cName[2]) "Table \. \"` WHERE " whereClauseColumns ";";
	print "\t\ttry {";
	print "\t\t\t\$result = DataBase::runQuery(\$queryString);";
	print "\t\t} catch (PDOException \$e) {";
	print "\t\t\tif (\$e->getCode() == \"42S02\") {";
	print "\t\t\t\terror_log(\"CREATING TABLES\");";
	print "\t\t\t\tself::create" cName[2] "Table();";
	print "\t\t\t}";
	print "\t\t\t\$result = DataBase::runQuery(\$queryString);";
	print "\t\t}";
	print "\t\tif (count(\$result) > 0) {";
	print readTable;
	print "\t\t\treturn count(\$result);";
	print "\t\t} else {";
	print "\t\t\t\/\/ Unsuccessful return will have a value = 0";
	print "\t\t\treturn 0;";
	print "\t\t}";
	print "\t}";

	# Write to Table
	print "\n\t\/\/ Write to Table";
	print "\tpublic function write" cName[2] "Data() {";
	print "\t\tglobal \$" tolower(cName[2]) "Table;";
	print "\t\t\$queryString = \"REPLACE INTO \`\" \. \$" tolower(cName[2]) "Table \. \"\` (" writeTable1 ")\";";
	print "\t\t\$queryString = \$queryString \. \' VALUES (" writeTable2 ")\';";
	print "\t\ttry {";
	print "\t\t\t\$result = DataBase::runQuery(\$queryString);";
	print "\t\t\treturn 1;";
	print "\t\t} catch (PDOException \$e) {";
	print "\t\t\tif (\$e->getCode() == \"42S02\") {";
	print "\t\t\t\terror_log(\"CREATING TABLES\");";
	print "\t\t\t\tself::create" cName[2] "Table();";
	print "\t\t\t}";
	print "\t\t\t\$result = DataBase::runQuery(\$queryString);";
	print "\t\t\treturn 1;";
	print "\t\t}";
	print "\t}";

	print "}";
	print "?>";
}
