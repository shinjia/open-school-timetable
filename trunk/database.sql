-- Creator:       MySQL Workbench 5.2.37/ExportSQLite plugin 2009.12.02
-- Author:        AD2399
-- Caption:       New Model
-- Project:       Name of the project
-- Changed:       2012-02-09 21:28
-- Created:       2011-12-29 10:13
PRAGMA foreign_keys = 1;

-- Schema: ost_db
CREATE TABLE "teacher"(
  "teacher_id" INTEGER PRIMARY KEY NOT NULL,
  "teacher_name" TEXT NOT NULL,
  "teacher_account" TEXT NOT NULL,
  "teacher_password" TEXT NOT NULL,
  "teacher_salt" TEXT NOT NULL
);
CREATE TABLE "course"(
  "course_id" INTEGER PRIMARY KEY NOT NULL,
  "course_name" TEXT NOT NULL
);
CREATE TABLE "classroom"(
  "classroom_id" INTEGER PRIMARY KEY NOT NULL,
  "classroom_name" TEXT NOT NULL
);
CREATE TABLE "techer_limit"(
  "techer_limit_id" INTEGER PRIMARY KEY NOT NULL,
  "techer_limit_class_name" TEXT NOT NULL
);
CREATE TABLE "techer_request"(
  "techer_request_id" INTEGER PRIMARY KEY NOT NULL,
  "techer_request_class_name" TEXT NOT NULL
);
CREATE TABLE "course_limit"(
  "course_limit_id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
  "course_limit_class_name" TEXT NOT NULL
);
CREATE TABLE "course_request"(
  "course_request_id" INTEGER PRIMARY KEY NOT NULL,
  "course_request_class_name" TEXT NOT NULL
);
CREATE TABLE "year"(
  "year_id" INTEGER PRIMARY KEY NOT NULL,
  "year_time" TEXT NOT NULL
);
CREATE TABLE "teacher_has_techer_limit"(
  "teacher_has_techer_limit_id" INTEGER PRIMARY KEY NOT NULL,
  "teacher_id" INTEGER NOT NULL,
  "techer_limit_id" INTEGER NOT NULL,
  CONSTRAINT "teacher_id"
    FOREIGN KEY("teacher_id")
    REFERENCES "teacher"("teacher_id")
    ON DELETE CASCADE,
  CONSTRAINT "techer_limit_id"
    FOREIGN KEY("techer_limit_id")
    REFERENCES "techer_limit"("techer_limit_id")
    ON DELETE CASCADE
);
CREATE INDEX "teacher_has_techer_limit.techer_limit_id" ON "teacher_has_techer_limit"("techer_limit_id");
CREATE INDEX "teacher_has_techer_limit.teacher_id" ON "teacher_has_techer_limit"("teacher_id");
CREATE TABLE "teacher_has_techer_request"(
  "teacher_has_techer_request_id" INTEGER PRIMARY KEY NOT NULL,
  "teacher_id" INTEGER NOT NULL,
  "techer_request_id" INTEGER NOT NULL,
  CONSTRAINT "teacher_id"
    FOREIGN KEY("teacher_id")
    REFERENCES "teacher"("teacher_id")
    ON DELETE CASCADE,
  CONSTRAINT "techer_request_id"
    FOREIGN KEY("techer_request_id")
    REFERENCES "techer_request"("techer_request_id")
    ON DELETE CASCADE
);
CREATE INDEX "teacher_has_techer_request.techer_request_id" ON "teacher_has_techer_request"("techer_request_id");
CREATE INDEX "teacher_has_techer_request.teacher_id" ON "teacher_has_techer_request"("teacher_id");
CREATE TABLE "class"(
  "class_id" INTEGER PRIMARY KEY NOT NULL,
  "class_name" TEXT NOT NULL,
  "year_id" INTEGER NOT NULL,
  CONSTRAINT "year_id"
    FOREIGN KEY("year_id")
    REFERENCES "year"("year_id")
    ON DELETE SET NULL
);
CREATE INDEX "class.year_id" ON "class"("year_id");
CREATE TABLE "course_unit"(
  "course_unit_id" INTEGER PRIMARY KEY NOT NULL,
  "count" INTEGER NOT NULL DEFAULT 1,
  "teacher_id" INTEGER NOT NULL,
  "class_id" INTEGER NOT NULL,
  "course_id" INTEGER NOT NULL,
  "classroom_id" INTEGER NOT NULL DEFAULT 0,
  CONSTRAINT "teacher_id"
    FOREIGN KEY("teacher_id")
    REFERENCES "teacher"("teacher_id")
    ON DELETE CASCADE,
  CONSTRAINT "class_id"
    FOREIGN KEY("class_id")
    REFERENCES "class"("class_id")
    ON DELETE CASCADE,
  CONSTRAINT "course_id"
    FOREIGN KEY("course_id")
    REFERENCES "course"("course_id")
    ON DELETE CASCADE,
  CONSTRAINT "classroom_id"
    FOREIGN KEY("classroom_id")
    REFERENCES "classroom"("classroom_id")
    ON DELETE SET NULL
);
CREATE INDEX "course_unit.teacher_id" ON "course_unit"("teacher_id");
CREATE INDEX "course_unit.class_id" ON "course_unit"("class_id");
CREATE INDEX "course_unit.course_id" ON "course_unit"("course_id");
CREATE INDEX "course_unit.classroom_id" ON "course_unit"("classroom_id");
CREATE TABLE "course_unit_has_course_limit"(
  "course_unit_has_course_limit_id" INTEGER PRIMARY KEY NOT NULL,
  "course_unit_id" INTEGER NOT NULL,
  "course_limit_id" INTEGER NOT NULL,
  CONSTRAINT "course_unit_id"
    FOREIGN KEY("course_unit_id")
    REFERENCES "course_unit"("course_unit_id")
    ON DELETE CASCADE,
  CONSTRAINT "course_limit_id"
    FOREIGN KEY("course_limit_id")
    REFERENCES "course_limit"("course_limit_id")
    ON DELETE CASCADE
);
CREATE INDEX "course_unit_has_course_limit.course_limit_id" ON "course_unit_has_course_limit"("course_limit_id");
CREATE INDEX "course_unit_has_course_limit.course_unit_id" ON "course_unit_has_course_limit"("course_unit_id");
CREATE TABLE "course_unit_has_course_request"(
  "course_unit_has_course_request_id" INTEGER PRIMARY KEY NOT NULL,
  "course_unit_id" INTEGER NOT NULL,
  "course_request_id" INTEGER NOT NULL,
  CONSTRAINT "course_unit_id"
    FOREIGN KEY("course_unit_id")
    REFERENCES "course_unit"("course_unit_id")
    ON DELETE CASCADE,
  CONSTRAINT "course_request_id"
    FOREIGN KEY("course_request_id")
    REFERENCES "course_request"("course_request_id")
    ON DELETE CASCADE
);
CREATE INDEX "course_unit_has_course_request.course_request_id" ON "course_unit_has_course_request"("course_request_id");
CREATE INDEX "course_unit_has_course_request.course_unit_id" ON "course_unit_has_course_request"("course_unit_id");

