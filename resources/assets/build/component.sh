#! /bin/bash

# Constants
STYLE_COMPONENT_FOLDER="resources/assets/styles/components"
BLADE_COMPONENT_FOLDER="resources/views/partials"
STYLE_MAIN_FILE="resources/assets/styles/main.scss"
END_LOOP_PHRASE="done"

function pre_check() {
  [ ! -d "$STYLE_COMPONENT_FOLDER" ] && exit_with "Cannot find directory: $STYLE_COMPONENT_FOLDER"
  [ ! -d "$BLADE_COMPONENT_FOLDER" ] && exit_with "Cannot find directory: $BLADE_COMPONENT_FOLDER"
  [ ! -f "$STYLE_MAIN_FILE" ] && exit_with "Cannot find file: $STYLE_MAIN_FILE"
}

function exit_with() {
  local message=$1
  echo "❌ $message"
  exit 1
}

function main() {
  local component_name=""

  read -p "Component Name: " component_name

  while [ "$component_name" != "$END_LOOP_PHRASE" ]; do
    create_component $component_name
    read -p "Component Name: " component_name
  done
}

function create_component() {
  create_component_style $1
  import_component_style $1
  create_component_blade $1
}

function create_component_style() {
  local file="$STYLE_COMPONENT_FOLDER/_$1.scss"
  touch $file
  printf "[CREATED] $file\n"
}

function create_component_blade() {
  local file="$BLADE_COMPONENT_FOLDER/$1.blade.php"
  touch $file
  printf "[CREATED] $file\n"
}

function import_component_style() {
  local import_rule="@import \"components/$1\";"
  echo -e $import_rule >> $STYLE_MAIN_FILE
  printf "[IMPORTED] $import_rule\n"
}

# ==============================
# MAIN SCRIPT FILE
# ==============================
pre_check
main
