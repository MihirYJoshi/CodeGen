<?php
include("config.php");
include("database.php");

class Match {

	// Create properties to identify matches
	private $tournamentName;
	private $matchNumber;
	private $matchType;
	private $blue1_teamNumber;
	private $blue2_teamNumber;
	private $blue3_teamNumber;
	private $red1_teamNumber;
	private $red2_teamNumber;
	private $red3_teamNumber;
	
	// Data collected from theblueAlliance.com via API/Screen Scraping
	private $blue_taxi;
	private $red_taxi;
	private $blue_auto_count;
	private $red_auto_count;
	private $blue_auto_points;
	private $red_auto_points;
	private $blue_total_auto;
	private $red_total_auto;
	private $blue_teleop_count;
	private $red_teleop_count;
	private $blue_teleop_points;
	private $red_teleop_points;
	private $blue_total_teleop;
	private $red_total_teleop;
	private $blue_cargo_bonus;
	private $red_cargo_bonus;
	private $blue1_end_game;
	private $blue2_end_game;
	private $blue3_end_game;
	private $red1_end_game;
	private $red2_end_game;
	private $red3_end_game;
	private $blue_hanger_points;
	private $red_hanger_points;
	private $blue_hangar_bonus;
	private $red_hangar_bonus;
	private $blue_fouls;
	private $red_fouls;
	private $blue_total_score;
	private $red_total_score;
	private $blue_ranking_points;
	private $red_ranking_points;
	private $winning_alliance;
	
	// Data aggregated from match detail table (which is populated by the match scouters)
	private $blue1_upper_auto;
	private $blue2_upper_auto;
	private $blue3_upper_auto;
	private $red1_uper_auto;
	private $red2_upper_auto;
	private $red3_upper_auto;
	private $blue1_lower_auto;
	private $blue2_lower_auto;
	private $blue3_lower_auto;
	private $red1_lower_auto;
	private $red2_lower_auto;
	private $red3_lower_auto;
	private $blue1_upper_teleop;
	private $blue2_upper_teleop;
	private $blue3_upper_teleop;
	private $red1_uper_teleop;
	private $red2_upper_teleop;
	private $red3_upper_teleop;
	private $blue1_lower_teleop;
	private $blue2_lower_teleop;
	private $blue3_lower_teleop;
	private $red1_lower_teleop;
	private $red2_lower_teleop;
	private $red3_lower_teleop;
	private $blue1_climb;
	private $blue2_climb;
	private $blue3_climb;
	private $red1_climb;
	private $red2_climb;
	private $red3_climb;
	private $blue1_defense_score;
	private $blue2_defense_score;
	private $blue3_defense_score;
	private $red1_defense_score;
	private $red2_defense_score;
	private $red3_defense_score;
	
	// Data captured from video analysis of the match (near future)
	private $blue1_headmap;
	private $blue2_headmap;
	private $blue3_headmap;
	private $red1_headmap;
	private $red2_headmap;
	private $red3_headmap;


	// Default Constructor
	public function __construct () {
	}

	// Getter function for each class property
	public function get_tournamentName() {
		return $this->tournamentName;
	}

	public function get_matchNumber() {
		return $this->matchNumber;
	}

	public function get_matchType() {
		return $this->matchType;
	}

	public function get_blue1_teamNumber() {
		return $this->blue1_teamNumber;
	}

	public function get_blue2_teamNumber() {
		return $this->blue2_teamNumber;
	}

	public function get_blue3_teamNumber() {
		return $this->blue3_teamNumber;
	}

	public function get_red1_teamNumber() {
		return $this->red1_teamNumber;
	}

	public function get_red2_teamNumber() {
		return $this->red2_teamNumber;
	}

	public function get_red3_teamNumber() {
		return $this->red3_teamNumber;
	}

	public function get_blue_taxi() {
		return $this->blue_taxi;
	}

	public function get_red_taxi() {
		return $this->red_taxi;
	}

	public function get_blue_auto_count() {
		return $this->blue_auto_count;
	}

	public function get_red_auto_count() {
		return $this->red_auto_count;
	}

	public function get_blue_auto_points() {
		return $this->blue_auto_points;
	}

	public function get_red_auto_points() {
		return $this->red_auto_points;
	}

	public function get_blue_total_auto() {
		return $this->blue_total_auto;
	}

	public function get_red_total_auto() {
		return $this->red_total_auto;
	}

	public function get_blue_teleop_count() {
		return $this->blue_teleop_count;
	}

	public function get_red_teleop_count() {
		return $this->red_teleop_count;
	}

	public function get_blue_teleop_points() {
		return $this->blue_teleop_points;
	}

	public function get_red_teleop_points() {
		return $this->red_teleop_points;
	}

	public function get_blue_total_teleop() {
		return $this->blue_total_teleop;
	}

	public function get_red_total_teleop() {
		return $this->red_total_teleop;
	}

	public function get_blue_cargo_bonus() {
		return $this->blue_cargo_bonus;
	}

	public function get_red_cargo_bonus() {
		return $this->red_cargo_bonus;
	}

	public function get_blue1_end_game() {
		return $this->blue1_end_game;
	}

	public function get_blue2_end_game() {
		return $this->blue2_end_game;
	}

	public function get_blue3_end_game() {
		return $this->blue3_end_game;
	}

	public function get_red1_end_game() {
		return $this->red1_end_game;
	}

	public function get_red2_end_game() {
		return $this->red2_end_game;
	}

	public function get_red3_end_game() {
		return $this->red3_end_game;
	}

	public function get_blue_hanger_points() {
		return $this->blue_hanger_points;
	}

	public function get_red_hanger_points() {
		return $this->red_hanger_points;
	}

	public function get_blue_hangar_bonus() {
		return $this->blue_hangar_bonus;
	}

	public function get_red_hangar_bonus() {
		return $this->red_hangar_bonus;
	}

	public function get_blue_fouls() {
		return $this->blue_fouls;
	}

	public function get_red_fouls() {
		return $this->red_fouls;
	}

	public function get_blue_total_score() {
		return $this->blue_total_score;
	}

	public function get_red_total_score() {
		return $this->red_total_score;
	}

	public function get_blue_ranking_points() {
		return $this->blue_ranking_points;
	}

	public function get_red_ranking_points() {
		return $this->red_ranking_points;
	}

	public function get_winning_alliance() {
		return $this->winning_alliance;
	}

	public function get_blue1_upper_auto() {
		return $this->blue1_upper_auto;
	}

	public function get_blue2_upper_auto() {
		return $this->blue2_upper_auto;
	}

	public function get_blue3_upper_auto() {
		return $this->blue3_upper_auto;
	}

	public function get_red1_uper_auto() {
		return $this->red1_uper_auto;
	}

	public function get_red2_upper_auto() {
		return $this->red2_upper_auto;
	}

	public function get_red3_upper_auto() {
		return $this->red3_upper_auto;
	}

	public function get_blue1_lower_auto() {
		return $this->blue1_lower_auto;
	}

	public function get_blue2_lower_auto() {
		return $this->blue2_lower_auto;
	}

	public function get_blue3_lower_auto() {
		return $this->blue3_lower_auto;
	}

	public function get_red1_lower_auto() {
		return $this->red1_lower_auto;
	}

	public function get_red2_lower_auto() {
		return $this->red2_lower_auto;
	}

	public function get_red3_lower_auto() {
		return $this->red3_lower_auto;
	}

	public function get_blue1_upper_teleop() {
		return $this->blue1_upper_teleop;
	}

	public function get_blue2_upper_teleop() {
		return $this->blue2_upper_teleop;
	}

	public function get_blue3_upper_teleop() {
		return $this->blue3_upper_teleop;
	}

	public function get_red1_uper_teleop() {
		return $this->red1_uper_teleop;
	}

	public function get_red2_upper_teleop() {
		return $this->red2_upper_teleop;
	}

	public function get_red3_upper_teleop() {
		return $this->red3_upper_teleop;
	}

	public function get_blue1_lower_teleop() {
		return $this->blue1_lower_teleop;
	}

	public function get_blue2_lower_teleop() {
		return $this->blue2_lower_teleop;
	}

	public function get_blue3_lower_teleop() {
		return $this->blue3_lower_teleop;
	}

	public function get_red1_lower_teleop() {
		return $this->red1_lower_teleop;
	}

	public function get_red2_lower_teleop() {
		return $this->red2_lower_teleop;
	}

	public function get_red3_lower_teleop() {
		return $this->red3_lower_teleop;
	}

	public function get_blue1_climb() {
		return $this->blue1_climb;
	}

	public function get_blue2_climb() {
		return $this->blue2_climb;
	}

	public function get_blue3_climb() {
		return $this->blue3_climb;
	}

	public function get_red1_climb() {
		return $this->red1_climb;
	}

	public function get_red2_climb() {
		return $this->red2_climb;
	}

	public function get_red3_climb() {
		return $this->red3_climb;
	}

	public function get_blue1_defense_score() {
		return $this->blue1_defense_score;
	}

	public function get_blue2_defense_score() {
		return $this->blue2_defense_score;
	}

	public function get_blue3_defense_score() {
		return $this->blue3_defense_score;
	}

	public function get_red1_defense_score() {
		return $this->red1_defense_score;
	}

	public function get_red2_defense_score() {
		return $this->red2_defense_score;
	}

	public function get_red3_defense_score() {
		return $this->red3_defense_score;
	}

	public function get_blue1_headmap() {
		return $this->blue1_headmap;
	}

	public function get_blue2_headmap() {
		return $this->blue2_headmap;
	}

	public function get_blue3_headmap() {
		return $this->blue3_headmap;
	}

	public function get_red1_headmap() {
		return $this->red1_headmap;
	}

	public function get_red2_headmap() {
		return $this->red2_headmap;
	}

	public function get_red3_headmap() {
		return $this->red3_headmap;
	}


	// Setter function for each class property
	public function set_tournamentName($tournamentName) {
		$this->tournamentName = $tournamentName;
	}

	public function set_matchNumber($matchNumber) {
		$this->matchNumber = $matchNumber;
	}

	public function set_matchType($matchType) {
		$this->matchType = $matchType;
	}

	public function set_blue1_teamNumber($blue1_teamNumber) {
		$this->blue1_teamNumber = $blue1_teamNumber;
	}

	public function set_blue2_teamNumber($blue2_teamNumber) {
		$this->blue2_teamNumber = $blue2_teamNumber;
	}

	public function set_blue3_teamNumber($blue3_teamNumber) {
		$this->blue3_teamNumber = $blue3_teamNumber;
	}

	public function set_red1_teamNumber($red1_teamNumber) {
		$this->red1_teamNumber = $red1_teamNumber;
	}

	public function set_red2_teamNumber($red2_teamNumber) {
		$this->red2_teamNumber = $red2_teamNumber;
	}

	public function set_red3_teamNumber($red3_teamNumber) {
		$this->red3_teamNumber = $red3_teamNumber;
	}

	public function set_blue_taxi($blue_taxi) {
		$this->blue_taxi = $blue_taxi;
	}

	public function set_red_taxi($red_taxi) {
		$this->red_taxi = $red_taxi;
	}

	public function set_blue_auto_count($blue_auto_count) {
		$this->blue_auto_count = $blue_auto_count;
	}

	public function set_red_auto_count($red_auto_count) {
		$this->red_auto_count = $red_auto_count;
	}

	public function set_blue_auto_points($blue_auto_points) {
		$this->blue_auto_points = $blue_auto_points;
	}

	public function set_red_auto_points($red_auto_points) {
		$this->red_auto_points = $red_auto_points;
	}

	public function set_blue_total_auto($blue_total_auto) {
		$this->blue_total_auto = $blue_total_auto;
	}

	public function set_red_total_auto($red_total_auto) {
		$this->red_total_auto = $red_total_auto;
	}

	public function set_blue_teleop_count($blue_teleop_count) {
		$this->blue_teleop_count = $blue_teleop_count;
	}

	public function set_red_teleop_count($red_teleop_count) {
		$this->red_teleop_count = $red_teleop_count;
	}

	public function set_blue_teleop_points($blue_teleop_points) {
		$this->blue_teleop_points = $blue_teleop_points;
	}

	public function set_red_teleop_points($red_teleop_points) {
		$this->red_teleop_points = $red_teleop_points;
	}

	public function set_blue_total_teleop($blue_total_teleop) {
		$this->blue_total_teleop = $blue_total_teleop;
	}

	public function set_red_total_teleop($red_total_teleop) {
		$this->red_total_teleop = $red_total_teleop;
	}

	public function set_blue_cargo_bonus($blue_cargo_bonus) {
		$this->blue_cargo_bonus = $blue_cargo_bonus;
	}

	public function set_red_cargo_bonus($red_cargo_bonus) {
		$this->red_cargo_bonus = $red_cargo_bonus;
	}

	public function set_blue1_end_game($blue1_end_game) {
		$this->blue1_end_game = $blue1_end_game;
	}

	public function set_blue2_end_game($blue2_end_game) {
		$this->blue2_end_game = $blue2_end_game;
	}

	public function set_blue3_end_game($blue3_end_game) {
		$this->blue3_end_game = $blue3_end_game;
	}

	public function set_red1_end_game($red1_end_game) {
		$this->red1_end_game = $red1_end_game;
	}

	public function set_red2_end_game($red2_end_game) {
		$this->red2_end_game = $red2_end_game;
	}

	public function set_red3_end_game($red3_end_game) {
		$this->red3_end_game = $red3_end_game;
	}

	public function set_blue_hanger_points($blue_hanger_points) {
		$this->blue_hanger_points = $blue_hanger_points;
	}

	public function set_red_hanger_points($red_hanger_points) {
		$this->red_hanger_points = $red_hanger_points;
	}

	public function set_blue_hangar_bonus($blue_hangar_bonus) {
		$this->blue_hangar_bonus = $blue_hangar_bonus;
	}

	public function set_red_hangar_bonus($red_hangar_bonus) {
		$this->red_hangar_bonus = $red_hangar_bonus;
	}

	public function set_blue_fouls($blue_fouls) {
		$this->blue_fouls = $blue_fouls;
	}

	public function set_red_fouls($red_fouls) {
		$this->red_fouls = $red_fouls;
	}

	public function set_blue_total_score($blue_total_score) {
		$this->blue_total_score = $blue_total_score;
	}

	public function set_red_total_score($red_total_score) {
		$this->red_total_score = $red_total_score;
	}

	public function set_blue_ranking_points($blue_ranking_points) {
		$this->blue_ranking_points = $blue_ranking_points;
	}

	public function set_red_ranking_points($red_ranking_points) {
		$this->red_ranking_points = $red_ranking_points;
	}

	public function set_winning_alliance($winning_alliance) {
		$this->winning_alliance = $winning_alliance;
	}

	public function set_blue1_upper_auto($blue1_upper_auto) {
		$this->blue1_upper_auto = $blue1_upper_auto;
	}

	public function set_blue2_upper_auto($blue2_upper_auto) {
		$this->blue2_upper_auto = $blue2_upper_auto;
	}

	public function set_blue3_upper_auto($blue3_upper_auto) {
		$this->blue3_upper_auto = $blue3_upper_auto;
	}

	public function set_red1_uper_auto($red1_uper_auto) {
		$this->red1_uper_auto = $red1_uper_auto;
	}

	public function set_red2_upper_auto($red2_upper_auto) {
		$this->red2_upper_auto = $red2_upper_auto;
	}

	public function set_red3_upper_auto($red3_upper_auto) {
		$this->red3_upper_auto = $red3_upper_auto;
	}

	public function set_blue1_lower_auto($blue1_lower_auto) {
		$this->blue1_lower_auto = $blue1_lower_auto;
	}

	public function set_blue2_lower_auto($blue2_lower_auto) {
		$this->blue2_lower_auto = $blue2_lower_auto;
	}

	public function set_blue3_lower_auto($blue3_lower_auto) {
		$this->blue3_lower_auto = $blue3_lower_auto;
	}

	public function set_red1_lower_auto($red1_lower_auto) {
		$this->red1_lower_auto = $red1_lower_auto;
	}

	public function set_red2_lower_auto($red2_lower_auto) {
		$this->red2_lower_auto = $red2_lower_auto;
	}

	public function set_red3_lower_auto($red3_lower_auto) {
		$this->red3_lower_auto = $red3_lower_auto;
	}

	public function set_blue1_upper_teleop($blue1_upper_teleop) {
		$this->blue1_upper_teleop = $blue1_upper_teleop;
	}

	public function set_blue2_upper_teleop($blue2_upper_teleop) {
		$this->blue2_upper_teleop = $blue2_upper_teleop;
	}

	public function set_blue3_upper_teleop($blue3_upper_teleop) {
		$this->blue3_upper_teleop = $blue3_upper_teleop;
	}

	public function set_red1_uper_teleop($red1_uper_teleop) {
		$this->red1_uper_teleop = $red1_uper_teleop;
	}

	public function set_red2_upper_teleop($red2_upper_teleop) {
		$this->red2_upper_teleop = $red2_upper_teleop;
	}

	public function set_red3_upper_teleop($red3_upper_teleop) {
		$this->red3_upper_teleop = $red3_upper_teleop;
	}

	public function set_blue1_lower_teleop($blue1_lower_teleop) {
		$this->blue1_lower_teleop = $blue1_lower_teleop;
	}

	public function set_blue2_lower_teleop($blue2_lower_teleop) {
		$this->blue2_lower_teleop = $blue2_lower_teleop;
	}

	public function set_blue3_lower_teleop($blue3_lower_teleop) {
		$this->blue3_lower_teleop = $blue3_lower_teleop;
	}

	public function set_red1_lower_teleop($red1_lower_teleop) {
		$this->red1_lower_teleop = $red1_lower_teleop;
	}

	public function set_red2_lower_teleop($red2_lower_teleop) {
		$this->red2_lower_teleop = $red2_lower_teleop;
	}

	public function set_red3_lower_teleop($red3_lower_teleop) {
		$this->red3_lower_teleop = $red3_lower_teleop;
	}

	public function set_blue1_climb($blue1_climb) {
		$this->blue1_climb = $blue1_climb;
	}

	public function set_blue2_climb($blue2_climb) {
		$this->blue2_climb = $blue2_climb;
	}

	public function set_blue3_climb($blue3_climb) {
		$this->blue3_climb = $blue3_climb;
	}

	public function set_red1_climb($red1_climb) {
		$this->red1_climb = $red1_climb;
	}

	public function set_red2_climb($red2_climb) {
		$this->red2_climb = $red2_climb;
	}

	public function set_red3_climb($red3_climb) {
		$this->red3_climb = $red3_climb;
	}

	public function set_blue1_defense_score($blue1_defense_score) {
		$this->blue1_defense_score = $blue1_defense_score;
	}

	public function set_blue2_defense_score($blue2_defense_score) {
		$this->blue2_defense_score = $blue2_defense_score;
	}

	public function set_blue3_defense_score($blue3_defense_score) {
		$this->blue3_defense_score = $blue3_defense_score;
	}

	public function set_red1_defense_score($red1_defense_score) {
		$this->red1_defense_score = $red1_defense_score;
	}

	public function set_red2_defense_score($red2_defense_score) {
		$this->red2_defense_score = $red2_defense_score;
	}

	public function set_red3_defense_score($red3_defense_score) {
		$this->red3_defense_score = $red3_defense_score;
	}

	public function set_blue1_headmap($blue1_headmap) {
		$this->blue1_headmap = $blue1_headmap;
	}

	public function set_blue2_headmap($blue2_headmap) {
		$this->blue2_headmap = $blue2_headmap;
	}

	public function set_blue3_headmap($blue3_headmap) {
		$this->blue3_headmap = $blue3_headmap;
	}

	public function set_red1_headmap($red1_headmap) {
		$this->red1_headmap = $red1_headmap;
	}

	public function set_red2_headmap($red2_headmap) {
		$this->red2_headmap = $red2_headmap;
	}

	public function set_red3_headmap($red3_headmap) {
		$this->red3_headmap = $red3_headmap;
	}



	// Create Table
	public static function createMatchTable() {
		global $dbnane;
		global $matchTable;
		$queryString = "CREATE TABLE " . $dbname . "." . $matchTable . " (
			tournamentName VARCHAR(100) NOT NULL,
			matchNumber VARCHAR(10) NOT NULL,
			matchType VARCHAR(10) NOT NULL,
			blue1_teamNumber VARCHAR(10) NOT NULL,
			blue2_teamNumber VARCHAR(10) NOT NULL,
			blue3_teamNumber VARCHAR(10) NOT NULL,
			red1_teamNumber VARCHAR(10) NOT NULL,
			red2_teamNumber VARCHAR(10) NOT NULL,
			red3_teamNumber VARCHAR(10) NOT NULL,
			blue_taxi VARCHAR(10) NULL,
			red_taxi VARCHAR(10) NULL,
			blue_auto_count VARCHAR(10) NULL,
			red_auto_count VARCHAR(10) NULL,
			blue_auto_points VARCHAR(10) NULL,
			red_auto_points VARCHAR(10) NULL,
			blue_total_auto VARCHAR(10) NULL,
			red_total_auto VARCHAR(10) NULL,
			blue_teleop_count VARCHAR(10) NULL,
			red_teleop_count VARCHAR(10) NULL,
			blue_teleop_points VARCHAR(10) NULL,
			red_teleop_points VARCHAR(10) NULL,
			blue_total_teleop VARCHAR(10) NULL,
			red_total_teleop VARCHAR(10) NULL,
			blue_cargo_bonus VARCHAR(10) NULL,
			red_cargo_bonus VARCHAR(10) NULL,
			blue1_end_game VARCHAR(10) NULL,
			blue2_end_game VARCHAR(10) NULL,
			blue3_end_game VARCHAR(10) NULL,
			red1_end_game VARCHAR(10) NULL,
			red2_end_game VARCHAR(10) NULL,
			red3_end_game VARCHAR(10) NULL,
			blue_hanger_points VARCHAR(10) NULL,
			red_hanger_points VARCHAR(10) NULL,
			blue_hangar_bonus VARCHAR(10) NULL,
			red_hangar_bonus VARCHAR(10) NULL,
			blue_fouls VARCHAR(10) NULL,
			red_fouls VARCHAR(10) NULL,
			blue_total_score VARCHAR(10) NULL,
			red_total_score VARCHAR(10) NULL,
			blue_ranking_points VARCHAR(10) NULL,
			red_ranking_points VARCHAR(10) NULL,
			winning_alliance VARCHAR(10) NULL,
			blue1_upper_auto VARCHAR(10) NULL,
			blue2_upper_auto VARCHAR(10) NULL,
			blue3_upper_auto VARCHAR(10) NULL,
			red1_uper_auto VARCHAR(10) NULL,
			red2_upper_auto VARCHAR(10) NULL,
			red3_upper_auto VARCHAR(10) NULL,
			blue1_lower_auto VARCHAR(10) NULL,
			blue2_lower_auto VARCHAR(10) NULL,
			blue3_lower_auto VARCHAR(10) NULL,
			red1_lower_auto VARCHAR(10) NULL,
			red2_lower_auto VARCHAR(10) NULL,
			red3_lower_auto VARCHAR(10) NULL,
			blue1_upper_teleop VARCHAR(10) NULL,
			blue2_upper_teleop VARCHAR(10) NULL,
			blue3_upper_teleop VARCHAR(10) NULL,
			red1_uper_teleop VARCHAR(10) NULL,
			red2_upper_teleop VARCHAR(10) NULL,
			red3_upper_teleop VARCHAR(10) NULL,
			blue1_lower_teleop VARCHAR(10) NULL,
			blue2_lower_teleop VARCHAR(10) NULL,
			blue3_lower_teleop VARCHAR(10) NULL,
			red1_lower_teleop VARCHAR(10) NULL,
			red2_lower_teleop VARCHAR(10) NULL,
			red3_lower_teleop VARCHAR(10) NULL,
			blue1_climb VARCHAR(10) NULL,
			blue2_climb VARCHAR(10) NULL,
			blue3_climb VARCHAR(10) NULL,
			red1_climb VARCHAR(10) NULL,
			red2_climb VARCHAR(10) NULL,
			red3_climb VARCHAR(10) NULL,
			blue1_defense_score VARCHAR(10) NULL,
			blue2_defense_score VARCHAR(10) NULL,
			blue3_defense_score VARCHAR(10) NULL,
			red1_defense_score VARCHAR(10) NULL,
			red2_defense_score VARCHAR(10) NULL,
			red3_defense_score VARCHAR(10) NULL,
			blue1_headmap VARCHAR(10) NULL,
			blue2_headmap VARCHAR(10) NULL,
			blue3_headmap VARCHAR(10) NULL,
			red1_headmap VARCHAR(10) NULL,
			red2_headmap VARCHAR(10) NULL,
			red3_headmap VARCHAR(10) NULL,
			PRIMARY KEY (tournamentName, matchNumber)
		)";
		$result = DataBase::runQuery($queryString);
	}

	// Read from Table
	public function readMatchData($tournamentName, $matchNumber) {
		global $matchTable;
		$queryString = "SELECT * FROM `" . $matchTable . "` WHERE tournamentName = '" . $tournamentName . "' and matchNumber = '" . $matchNumber . "'";
		try {
			$result = DataBase::runQuery($queryString);
		} catch (PDOException $e) {
			if ($e->getCode() == "42S02") {
				error_log("CREATING TABLES");
				self::createTeamTable();
			}
			$result = DataBase::runQuery($queryString);
		}
		if (count($result) > 0) {
			$this->tournamentName = $result[0]['tournamentName'];
			$this->matchNumber = $result[0]['matchNumber'];
			$this->matchType = $result[0]['matchType'];
			$this->blue1_teamNumber = $result[0]['blue1_teamNumber'];
			$this->blue2_teamNumber = $result[0]['blue2_teamNumber'];
			$this->blue3_teamNumber = $result[0]['blue3_teamNumber'];
			$this->red1_teamNumber = $result[0]['red1_teamNumber'];
			$this->red2_teamNumber = $result[0]['red2_teamNumber'];
			$this->red3_teamNumber = $result[0]['red3_teamNumber'];
			$this->blue_taxi = $result[0]['blue_taxi'];
			$this->red_taxi = $result[0]['red_taxi'];
			$this->blue_auto_count = $result[0]['blue_auto_count'];
			$this->red_auto_count = $result[0]['red_auto_count'];
			$this->blue_auto_points = $result[0]['blue_auto_points'];
			$this->red_auto_points = $result[0]['red_auto_points'];
			$this->blue_total_auto = $result[0]['blue_total_auto'];
			$this->red_total_auto = $result[0]['red_total_auto'];
			$this->blue_teleop_count = $result[0]['blue_teleop_count'];
			$this->red_teleop_count = $result[0]['red_teleop_count'];
			$this->blue_teleop_points = $result[0]['blue_teleop_points'];
			$this->red_teleop_points = $result[0]['red_teleop_points'];
			$this->blue_total_teleop = $result[0]['blue_total_teleop'];
			$this->red_total_teleop = $result[0]['red_total_teleop'];
			$this->blue_cargo_bonus = $result[0]['blue_cargo_bonus'];
			$this->red_cargo_bonus = $result[0]['red_cargo_bonus'];
			$this->blue1_end_game = $result[0]['blue1_end_game'];
			$this->blue2_end_game = $result[0]['blue2_end_game'];
			$this->blue3_end_game = $result[0]['blue3_end_game'];
			$this->red1_end_game = $result[0]['red1_end_game'];
			$this->red2_end_game = $result[0]['red2_end_game'];
			$this->red3_end_game = $result[0]['red3_end_game'];
			$this->blue_hanger_points = $result[0]['blue_hanger_points'];
			$this->red_hanger_points = $result[0]['red_hanger_points'];
			$this->blue_hangar_bonus = $result[0]['blue_hangar_bonus'];
			$this->red_hangar_bonus = $result[0]['red_hangar_bonus'];
			$this->blue_fouls = $result[0]['blue_fouls'];
			$this->red_fouls = $result[0]['red_fouls'];
			$this->blue_total_score = $result[0]['blue_total_score'];
			$this->red_total_score = $result[0]['red_total_score'];
			$this->blue_ranking_points = $result[0]['blue_ranking_points'];
			$this->red_ranking_points = $result[0]['red_ranking_points'];
			$this->winning_alliance = $result[0]['winning_alliance'];
			$this->blue1_upper_auto = $result[0]['blue1_upper_auto'];
			$this->blue2_upper_auto = $result[0]['blue2_upper_auto'];
			$this->blue3_upper_auto = $result[0]['blue3_upper_auto'];
			$this->red1_uper_auto = $result[0]['red1_uper_auto'];
			$this->red2_upper_auto = $result[0]['red2_upper_auto'];
			$this->red3_upper_auto = $result[0]['red3_upper_auto'];
			$this->blue1_lower_auto = $result[0]['blue1_lower_auto'];
			$this->blue2_lower_auto = $result[0]['blue2_lower_auto'];
			$this->blue3_lower_auto = $result[0]['blue3_lower_auto'];
			$this->red1_lower_auto = $result[0]['red1_lower_auto'];
			$this->red2_lower_auto = $result[0]['red2_lower_auto'];
			$this->red3_lower_auto = $result[0]['red3_lower_auto'];
			$this->blue1_upper_teleop = $result[0]['blue1_upper_teleop'];
			$this->blue2_upper_teleop = $result[0]['blue2_upper_teleop'];
			$this->blue3_upper_teleop = $result[0]['blue3_upper_teleop'];
			$this->red1_uper_teleop = $result[0]['red1_uper_teleop'];
			$this->red2_upper_teleop = $result[0]['red2_upper_teleop'];
			$this->red3_upper_teleop = $result[0]['red3_upper_teleop'];
			$this->blue1_lower_teleop = $result[0]['blue1_lower_teleop'];
			$this->blue2_lower_teleop = $result[0]['blue2_lower_teleop'];
			$this->blue3_lower_teleop = $result[0]['blue3_lower_teleop'];
			$this->red1_lower_teleop = $result[0]['red1_lower_teleop'];
			$this->red2_lower_teleop = $result[0]['red2_lower_teleop'];
			$this->red3_lower_teleop = $result[0]['red3_lower_teleop'];
			$this->blue1_climb = $result[0]['blue1_climb'];
			$this->blue2_climb = $result[0]['blue2_climb'];
			$this->blue3_climb = $result[0]['blue3_climb'];
			$this->red1_climb = $result[0]['red1_climb'];
			$this->red2_climb = $result[0]['red2_climb'];
			$this->red3_climb = $result[0]['red3_climb'];
			$this->blue1_defense_score = $result[0]['blue1_defense_score'];
			$this->blue2_defense_score = $result[0]['blue2_defense_score'];
			$this->blue3_defense_score = $result[0]['blue3_defense_score'];
			$this->red1_defense_score = $result[0]['red1_defense_score'];
			$this->red2_defense_score = $result[0]['red2_defense_score'];
			$this->red3_defense_score = $result[0]['red3_defense_score'];
			$this->blue1_headmap = $result[0]['blue1_headmap'];
			$this->blue2_headmap = $result[0]['blue2_headmap'];
			$this->blue3_headmap = $result[0]['blue3_headmap'];
			$this->red1_headmap = $result[0]['red1_headmap'];
			$this->red2_headmap = $result[0]['red2_headmap'];
			$this->red3_headmap = $result[0]['red3_headmap'];

			return count($result);
		} else {
			// Unsuccessful return will have a value = 0
			return 0;
		}
	}

	// Write to Table
	public function writeMatchData() {
		global $matchTable;
		$queryString = "REPLACE INTO `" . $matchTable . "` (tournamentName, matchNumber, matchType, blue1_teamNumber, blue2_teamNumber, blue3_teamNumber, red1_teamNumber, red2_teamNumber, red3_teamNumber, blue_taxi, red_taxi, blue_auto_count, red_auto_count, blue_auto_points, red_auto_points, blue_total_auto, red_total_auto, blue_teleop_count, red_teleop_count, blue_teleop_points, red_teleop_points, blue_total_teleop, red_total_teleop, blue_cargo_bonus, red_cargo_bonus, blue1_end_game, blue2_end_game, blue3_end_game, red1_end_game, red2_end_game, red3_end_game, blue_hanger_points, red_hanger_points, blue_hangar_bonus, red_hangar_bonus, blue_fouls, red_fouls, blue_total_score, red_total_score, blue_ranking_points, red_ranking_points, winning_alliance, blue1_upper_auto, blue2_upper_auto, blue3_upper_auto, red1_uper_auto, red2_upper_auto, red3_upper_auto, blue1_lower_auto, blue2_lower_auto, blue3_lower_auto, red1_lower_auto, red2_lower_auto, red3_lower_auto, blue1_upper_teleop, blue2_upper_teleop, blue3_upper_teleop, red1_uper_teleop, red2_upper_teleop, red3_upper_teleop, blue1_lower_teleop, blue2_lower_teleop, blue3_lower_teleop, red1_lower_teleop, red2_lower_teleop, red3_lower_teleop, blue1_climb, blue2_climb, blue3_climb, red1_climb, red2_climb, red3_climb, blue1_defense_score, blue2_defense_score, blue3_defense_score, red1_defense_score, red2_defense_score, red3_defense_score, blue1_headmap, blue2_headmap, blue3_headmap, red1_headmap, red2_headmap, red3_headmap)";
		$queryString = $queryString . ' VALUES ("' . $this->tournamentName . '","' . $this->matchNumber . '","' . $this->matchType . '","' . $this->blue1_teamNumber . '","' . $this->blue2_teamNumber . '","' . $this->blue3_teamNumber . '","' . $this->red1_teamNumber . '","' . $this->red2_teamNumber . '","' . $this->red3_teamNumber . '","' . $this->blue_taxi . '","' . $this->red_taxi . '","' . $this->blue_auto_count . '","' . $this->red_auto_count . '","' . $this->blue_auto_points . '","' . $this->red_auto_points . '","' . $this->blue_total_auto . '","' . $this->red_total_auto . '","' . $this->blue_teleop_count . '","' . $this->red_teleop_count . '","' . $this->blue_teleop_points . '","' . $this->red_teleop_points . '","' . $this->blue_total_teleop . '","' . $this->red_total_teleop . '","' . $this->blue_cargo_bonus . '","' . $this->red_cargo_bonus . '","' . $this->blue1_end_game . '","' . $this->blue2_end_game . '","' . $this->blue3_end_game . '","' . $this->red1_end_game . '","' . $this->red2_end_game . '","' . $this->red3_end_game . '","' . $this->blue_hanger_points . '","' . $this->red_hanger_points . '","' . $this->blue_hangar_bonus . '","' . $this->red_hangar_bonus . '","' . $this->blue_fouls . '","' . $this->red_fouls . '","' . $this->blue_total_score . '","' . $this->red_total_score . '","' . $this->blue_ranking_points . '","' . $this->red_ranking_points . '","' . $this->winning_alliance . '","' . $this->blue1_upper_auto . '","' . $this->blue2_upper_auto . '","' . $this->blue3_upper_auto . '","' . $this->red1_uper_auto . '","' . $this->red2_upper_auto . '","' . $this->red3_upper_auto . '","' . $this->blue1_lower_auto . '","' . $this->blue2_lower_auto . '","' . $this->blue3_lower_auto . '","' . $this->red1_lower_auto . '","' . $this->red2_lower_auto . '","' . $this->red3_lower_auto . '","' . $this->blue1_upper_teleop . '","' . $this->blue2_upper_teleop . '","' . $this->blue3_upper_teleop . '","' . $this->red1_uper_teleop . '","' . $this->red2_upper_teleop . '","' . $this->red3_upper_teleop . '","' . $this->blue1_lower_teleop . '","' . $this->blue2_lower_teleop . '","' . $this->blue3_lower_teleop . '","' . $this->red1_lower_teleop . '","' . $this->red2_lower_teleop . '","' . $this->red3_lower_teleop . '","' . $this->blue1_climb . '","' . $this->blue2_climb . '","' . $this->blue3_climb . '","' . $this->red1_climb . '","' . $this->red2_climb . '","' . $this->red3_climb . '","' . $this->blue1_defense_score . '","' . $this->blue2_defense_score . '","' . $this->blue3_defense_score . '","' . $this->red1_defense_score . '","' . $this->red2_defense_score . '","' . $this->red3_defense_score . '","' . $this->blue1_headmap . '","' . $this->blue2_headmap . '","' . $this->blue3_headmap . '","' . $this->red1_headmap . '","' . $this->red2_headmap . '","' . $this->red3_headmap . '")';
		try {
			$result = DataBase::runQuery($queryString);
			return 1;
		} catch (PDOException $e) {
			if ($e->getCode() == "42S02") {
				error_log("CREATING TABLES");
				self::createTeamTable();
			}
			$result = DataBase::runQuery($queryString);
			return 1;
		}
	}
}
?>
