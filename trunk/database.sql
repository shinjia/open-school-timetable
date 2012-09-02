-- Creator:       MySQL Workbench 5.2.37/ExportSQLite plugin 2009.12.02
-- Author:        otto
-- Caption:       New Model
-- Project:       Name of the project
-- Changed:       2012-09-02 11:45
-- Created:       2012-08-29 23:09
PRAGMA foreign_keys = OFF;

-- Schema: mydb
BEGIN;
CREATE TABLE "teacher"(
  "teacher_id" INTEGER PRIMARY KEY NOT NULL,
  "teacher_name" TEXT NOT NULL,
  "teacher_account" TEXT NOT NULL,
  "teacher_password" TEXT NOT NULL
);
CREATE TABLE "teacher_require"(
  "teacher_require_id" INTEGER PRIMARY KEY NOT NULL
);
CREATE TABLE "course"(
  "course_id" INTEGER PRIMARY KEY NOT NULL,
  "course_name" TEXT NOT NULL
);
CREATE TABLE "year"(
  "year_id" INTEGER PRIMARY KEY NOT NULL,
  "year_name" TEXT NOT NULL
);
CREATE TABLE "course_limit"(
  "course_limit_id" INTEGER PRIMARY KEY NOT NULL
);
CREATE TABLE "teacher_require_has_teacher"(
  "teacher_require_teacher_require_id" INTEGER NOT NULL,
  "teacher_idteacher" INTEGER NOT NULL,
  PRIMARY KEY("teacher_require_teacher_require_id","teacher_idteacher"),
  CONSTRAINT "fk_teacher_require_has_teacher_teacher_require1"
    FOREIGN KEY("teacher_require_teacher_require_id")
    REFERENCES "teacher_require"("teacher_require_id"),
  CONSTRAINT "fk_teacher_require_has_teacher_teacher1"
    FOREIGN KEY("teacher_idteacher")
    REFERENCES "teacher"("teacher_id")
);
CREATE INDEX "teacher_require_has_teacher.fk_teacher_require_has_teacher_teacher1" ON "teacher_require_has_teacher"("teacher_idteacher");
CREATE INDEX "teacher_require_has_teacher.fk_teacher_require_has_teacher_teacher_require1" ON "teacher_require_has_teacher"("teacher_require_teacher_require_id");
CREATE TABLE "class"(
  "class_id" INTEGER PRIMARY KEY NOT NULL,
  "class_name" TEXT NOT NULL,
  "year_id" INTEGER NOT NULL,
  CONSTRAINT "fk_class_year1"
    FOREIGN KEY("year_id")
    REFERENCES "year"("year_id")
);
CREATE INDEX "class.fk_class_year1" ON "class"("year_id");
CREATE TABLE "course_unit"(
  "course_unit_id" INTEGER PRIMARY KEY NOT NULL,
  "teacher_id" INTEGER NOT NULL,
  "course_id" INTEGER NOT NULL,
  "class_id" INTEGER NOT NULL,
  "count" INTEGER NOT NULL,
  CONSTRAINT "fk_course_unit_teacher"
    FOREIGN KEY("teacher_id")
    REFERENCES "teacher"("teacher_id"),
  CONSTRAINT "fk_course_unit_course1"
    FOREIGN KEY("course_id")
    REFERENCES "course"("course_id"),
  CONSTRAINT "fk_course_unit_class1"
    FOREIGN KEY("class_id")
    REFERENCES "class"("class_id")
);
CREATE INDEX "course_unit.fk_course_unit_teacher" ON "course_unit"("teacher_id");
CREATE INDEX "course_unit.fk_course_unit_course1" ON "course_unit"("course_id");
CREATE INDEX "course_unit.fk_course_unit_class1" ON "course_unit"("class_id");
CREATE TABLE "course_unit_has_course_limit"(
  "idcourse_unit" INTEGER NOT NULL,
  "course_limit_id" INTEGER NOT NULL,
  PRIMARY KEY("idcourse_unit","course_limit_id"),
  CONSTRAINT "fk_course_unit_has_course_limit_course_unit1"
    FOREIGN KEY("idcourse_unit")
    REFERENCES "course_unit"("course_unit_id"),
  CONSTRAINT "fk_course_unit_has_course_limit_course_limit1"
    FOREIGN KEY("course_limit_id")
    REFERENCES "course_limit"("course_limit_id")
);
CREATE INDEX "course_unit_has_course_limit.fk_course_unit_has_course_limit_course_limit1" ON "course_unit_has_course_limit"("course_limit_id");
CREATE INDEX "course_unit_has_course_limit.fk_course_unit_has_course_limit_course_unit1" ON "course_unit_has_course_limit"("idcourse_unit");
COMMIT;
