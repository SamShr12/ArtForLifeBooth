@extends('myViews.admin.admin')

<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

:root {
  --app-bg-dark: #01081f;
  --app-bg-before: linear-gradient(180deg, rgba(1,8,31,0) 0%, rgba(1,8,31,1) 100%);
  --app-bg-before-2: linear-gradient(0deg, rgba(1,8,31,0) 0%, rgba(1,8,31,1) 100%);
  --app-bg-light: #151c32;
  --app-logo: #3d7eff;
  --nav-link: #5e6a81;
  --nav-link-active: #fff;
  --list-item-hover: #0c1635;
  --main-color: #fff;
  --secondary-color: #5e6a81;
  --color-light: rgba(52, 129, 210, .2);
  --warning-bg: #ffe5e5;
  --warning-icon: #ff8181;
  --applicant-bg: #e3fff1;
  --applicant-icon: #61e1a1;
  --close-bg: #fff8e5;
  --close-icon: #fdbc64;
  --draft-bg: #fed8b3;
  --draft-icon: #e9780e;
}

.app-container {
  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  max-width: 1680px;
}

.app-left {
  -ms-flex-preferred-size: 240px;
      flex-basis: 240px;
  background-color: #c4c2bf;
  height: 100%;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 24px 0;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}

.app-left.show {
  right: 0;
  opacity: 1;
}

.app-main {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  height: 100%;
  overflow-y: auto;
  overflow-x: hidden;
  background-color: #ffffff;
  padding: 24px;
  /* background: radial-gradient(circle, #bdbdbe 1%, #eceef1 100%); */
}

.app-right {
  -ms-flex-preferred-size: 320px;
      flex-basis: 320px;
  width: 320px;
  background-color: #c4c2bf;
  height: 100%;
  padding: 64px 0 0 0;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  position: relative;
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}

.app-right:before {
  content: "";
  position: absolute;
  bottom: 0;
  height: 48px;
  width: 100%;
  z-index: 1;
}

.app-right.show {
  right: 0;
  opacity: 1;
}

.app-right .close-right {
  display: none;
}

.app-right-content {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  height: 100%;
  overflow-y: auto;
  overflow-x: hidden;
}

.app-logo {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  color: var(--app-logo);
  margin-right: 16px;
  padding: 0 24px;
}

.app-logo span {
  color: #fff;
  display: inline-block;
  line-height: 24px;
  font-size: 16px;
  margin-left: 16px;
}

ul {
  list-style-type: none;
  padding: 0;
}

a {
  text-decoration: none;
  cursor: pointer;
}

button {
  cursor: pointer;
}

.nav-list {
  margin-top: 40px;
}

.nav-list-item {
  margin-bottom: 12px;
}

.nav-list-item:not(.active):hover {
  background-color: var(--list-item-hover);
}

.nav-list-item.active .nav-list-link {
  color: var(--nav-link-active);
}

.nav-list-item.active .nav-list-link:after {
  height: 100%;
  opacity: 1;
}

.nav-list-item.active svg {
  stroke: var(--app-logo);
}

.nav-list-link {
  font-weight: 300;
  font-size: 14px;
  line-height: 24px;
  padding: 8px 24px;
  color: var(--nav-link);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  position: relative;
}

.nav-list-link svg {
  margin-right: 12px;
}

.nav-list-link:after {
  content: "";
  height: 100%;
  width: 2px;
  background-color: var(--app-logo);
  right: 0;
  top: 0;
  position: absolute;
  border-radius: 2px;
  opacity: 0;
  height: 0;
}

.open-right-area {
  display: none;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border: none;
  border-radius: 4px;
  height: 40px;
  width: 40px;
  padding: 0;
}

.main-header-line {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-bottom: 16px;
}

.main-header-line h1 {
  color: #01081f;
  margin: 0;
  font-size: 24px;
  line-height: 32px;
}

.main-header-line input {
  border-radius: 4px;
  background-color: var(--color-light);
  border: none;
  border: 1px solid var(--color-light);
  color: var(--main-color);
  height: 32px;
  padding: 0 8px 0 32px;
  font-size: 14px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%233481d2' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-search'%3E%3Ccircle cx='11' cy='11' r='8'/%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'/%3E%3C/svg%3E");
  background-position: center left 10px;
  background-repeat: no-repeat;
  background-size: 16px;
  outline: none;
  -webkit-transition: 0.2s;
  transition: 0.2s;
  width: 100%;
  max-width: 400px;
  margin-left: 16px;
}

.main-header-line input:placeholder {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.6);
}

.main-header-line input:hover, .main-header-line input:focus {
  border: 1px solid #3481d2;
  -webkit-box-shadow: 0 0 0 3px var(--color-light);
          box-shadow: 0 0 0 3px var(--color-light);
}

.chart-row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  margin: 0 -8px;
}

.chart-row.three .chart-container-wrapper {
  width: 33.3%;
}

.chart-row.three .chart-container-wrapper .chart-container {
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.chart-row.two .big {
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
  max-width: 77.7%;
}

.chart-row.two .big .chart-container {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.chart-row.two .small {
  width: 33.3%;
}

.chart-row.two .small .chart-container {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.chart-row.two .small .chart-container + .chart-container {
  margin-top: 16px;
}

.line-chart {
  width: 100%;
  margin-top: 24px;
}

.chart-container {
  width: 100%;
  border-radius: 10px;
  border: 2px solid #adabab;
  padding: 16px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.chart-container.applicants {
  max-height: 336px;
  overflow-y: auto;
}

.chart-container-wrapper {
  padding: 8px;
}

.chart-info-wrapper {
  -ms-flex-negative: 0;
      flex-shrink: 0;
  -ms-flex-preferred-size: 120px;
      flex-basis: 120px;
}

.chart-info-wrapper h2 {
  color: var(--secondary-color);
  font-size: 16px;
  line-height: 16px;
  font-weight: 600;
  text-transform: uppercase;
  margin: 0 0 8px 0;
}

.chart-info-wrapper span {
  color: var(--secondary-color);
  font-size: 24px;
  line-height: 32px;
  font-weight: 900;
}

.chart-svg {
  position: relative;
  max-width: 90px;
  min-width: 40px;
  -webkit-box-flex: 1;
      -ms-flex: 1;
          flex: 1;
}

.circle-bg {
  fill: none;
  stroke: #eee;
  stroke-width: 1.2;
}

.circle {
  fill: none;
  stroke-width: 1.6;
  stroke-linecap: round;
  -webkit-animation: progress 1s ease-out forwards;
  animation: progress 1s ease-out forwards;
}

.circular-chart.orange .circle {
  stroke: #e6645b;
}

.circular-chart.orange .circle-bg {
  stroke: #776547;
}

.circular-chart.blue .circle {
  stroke: #00cfde;
}

.circular-chart.blue .circle-bg {
  stroke: #557b88;
}

.circular-chart.pink .circle {
  stroke: #7d94fc;
}

.circular-chart.pink .circle-bg {
  stroke: #6f5684;
}

.percentage {
  fill: #fff;
  font-size: 0.5em;
  text-anchor: middle;
  font-weight: 400;
}

@-webkit-keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}

@keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}

.chart-container-header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  margin-bottom: 12px;
}

.chart-container-header h2 {
  margin: 0;
  color: var(--main-color);
  font-size: 12px;
  line-height: 16px;
  opacity: 0.8;
}

.chart-container-header span {
  color: var(--app-logo);
  font-size: 12px;
  line-height: 16px;
}

.acquisitions-bar {
  width: 100%;
  height: 4px;
  border-radius: 4px;
  margin-top: 16px;
  margin-bottom: 8px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
}

.bar-progress {
  height: 4px;
  display: inline-block;
}

.bar-progress.applications {
  background-color: #ff7dcb;
}

.bar-progress.shortlisted {
  background-color: #00cfde;
}

.bar-progress.on-hold {
  background-color: #fdac42;
}

.bar-progress.rejected {
  background-color: #ff5c5c;
}

.progress-bar-info {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-top: 8px;
  width: 100%;
}

.progress-color {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 8px;
}

.progress-color.applications {
  background-color: #ff7dcb;
}

.progress-color.shortlisted {
  background-color: #00cfde;
}

.progress-color.on-hold {
  background-color: #fdac42;
}

.progress-color.rejected {
  background-color: #ff5c5c;
}

.progress-type {
  color: var(--secondary-color);
  font-size: 12px;
  line-height: 16px;
}

.progress-amount {
  color: var(--secondary-color);
  font-size: 12px;
  line-height: 16px;
  margin-left: auto;
}

.applicant-line {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  width: 100%;
  margin-top: 12px;
}

.applicant-line img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  -o-object-fit: cover;
  object-fit: cover;
  margin-right: 10px;
  -ms-flex-negative: 0;
      flex-shrink: 0;
}

.applicant-info span {
  color: var(--main-color);
  font-size: 14px;
  line-height: 16px;
}

.applicant-info p {
  margin: 4px 0;
  font-size: 12px;
  line-height: 16px;
  color: var(--secondary-color);
}

.profile-box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  border-bottom: 3px solid #ccc;
}

.profile-box:before {
  content: "";
  position: absolute;
  top: 100%;
  height: 48px;
  width: 100%;
  background-image: var(--app-bg-before-2);
  z-index: 1;
}

.profile-photo-wrapper {
  width: 80px;
  height: 80px;
  overflow: hidden;
  border-radius: 50%;
  margin-bottom: 16px;
}

.profile-photo-wrapper img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.profile-text, .profile-subtext {
  font-size: 12px;
  line-height: 16px;
  color: var(--secondary-color);
  margin: 0 0 8px 0;
}

.profile-text {
  font-weight: 600;
}

.app-right-section-header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0 16px;
  margin-top: 16px;
}

.app-right-section-header h2 {
  font-size: 14px;
  line-height: 24px;
  color: var(--secondary-color);
}

.app-right-section-header span {
  display: inline-block;
  color: var(--secondary-color);
  position: relative;
}

.app-right-section-header span.notification-active:before {
  content: "";
  position: absolute;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background-color: var(--app-logo);
  top: -1px;
  right: -1px;
  -webkit-box-shadow: 0 0 0 2px var(--app-bg-dark);
          box-shadow: 0 0 0 2px var(--app-bg-dark);
}

.message-line {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 8px 16px;
  margin-bottom: 8px;
}

.message-line:hover {
  background: #ccc;
}

.message-line img {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  -o-object-fit: cover;
  object-fit: cover;
  margin-right: 8px;
}

.message-text-wrapper {
  max-width: calc(100% - 48px);
}

.message-text {
  font-size: 14px;
  line-height: 16px;
  color: var(--main-color);
  margin: 0;
  opacity: 0.8;
  width: 100%;
}

.message-subtext {
  font-size: 12px;
  line-height: 16px;
  color: var(--secondary-color);
  margin: 4px 0 0 0;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 100%;
}

.activity-line {
  padding: 8px 16px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
      -ms-flex-align: start;
          align-items: flex-start;
  margin-bottom: 8px;
}

.activity-link {
  font-size: 12px;
  line-height: 16px;
  color: var(--app-logo);
  text-decoration: underline;
}

.activity-text {
  font-size: 12px;
  line-height: 16px;
  color: var(--secondary-color);
  width: 100%;
  margin: 0;
}

.activity-text strong {
  color: var(--app-bg-dark);
  opacity: 0.4;
  font-weight: 500;
}

.activity-icon {
  border-radius: 8px;
  width: 32px;
  height: 32px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -ms-flex-negative: 0;
      flex-shrink: 0;
  margin-right: 8px;
}

.activity-icon.warning {
  background-color: var(--warning-bg);
  color: var(--warning-icon);
}

.activity-icon.applicant {
  background-color: var(--applicant-bg);
  color: var(--applicant-icon);
}

.activity-icon.close {
  background-color: var(--close-bg);
  color: var(--close-icon);
}

.activity-icon.draft {
  background-color: var(--draft-bg);
  color: var(--draft-icon);
}

.action-buttons {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.menu-button {
  width: 40px;
  height: 40px;
  margin-left: 8px;
  display: none;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 0;
  background-color: var(--app-bg-dark);
  border: none;
  color: var(--main-color);
  border-radius: 4px;
}

.close-menu {
  position: absolute;
  top: 16px;
  right: 16px;
  display: none;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  border: none;
  background-color: transparent;
  padding: 0;
  color: var(--main-color);
  cursor: pointer;
}

@media screen and (max-width: 1350px) {
  .app-right {
    -ms-flex-preferred-size: 240px;
        flex-basis: 240px;
    width: 240px;
  }
  .app-left {
    -ms-flex-preferred-size: 200px;
        flex-basis: 200px;
  }
}

@media screen and (max-width: 1200px) {
  .app-right {
    position: absolute;
    opacity: 0;
    top: 0;
    z-index: 2;
    height: 100%;
    width: 320px;
    right: -100%;
    -webkit-box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);
            box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);
  }
  .app-right .close-right {
    position: absolute;
    top: 16px;
    right: 16px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    border: none;
    background-color: transparent;
    padding: 0;
    color: var(--main-color);
    cursor: pointer;
  }
  .app-main .open-right-area {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    color: var(--main-color);
  }
}

@media screen and (max-width: 1180px) {
  .chart-row.two {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .chart-row.two .big {
    max-width: 100%;
  }
  .chart-row.two .small {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    width: 100%;
  }
  .chart-row.two .small .chart-container {
    width: calc(50% - 8px);
  }
  .chart-row.two .small .chart-container.applicants {
    margin-top: 0;
  }
}

@media screen and (max-width: 920px) {
  .menu-button {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
  }
  .app-left {
    position: absolute;
    opacity: 0;
    top: 0;
    z-index: 2;
    height: 100%;
    width: 320px;
    right: -100%;
    -webkit-box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);
            box-shadow: 0 0 10px 5px rgba(1, 8, 31, 0.4);
  }
  .close-menu {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
  }
}

@media screen and (max-width: 650px) {
  .chart-row.three {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .chart-row.three .chart-container-wrapper {
    width: 100%;
  }
  .chart-svg {
    min-height: 60px;
    min-width: 40px;
  }
}

@media screen and (max-width: 520px) {
  .chart-row.two .small {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
  }
  .chart-row.two .small .chart-container {
    width: 100%;
  }
  .chart-row.two .small .chart-container.applicants {
    margin-top: 16px;
  }
  .main-header-line h1 {
    font-size: 14px;
  }
}
</style>

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
    </div>
  </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="app-main">
    <div class="main-header-line">
      <h1></h1>
      <div class="action-buttons">
        <button class="open-right-area">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      </button>
      <button class="menu-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      </div>
    </div>
    <div class="chart-row three">
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Menu</h2>
            <span>{{count($menu)}}</span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart pink">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">30%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Users</h2>
            <span>{{count($customers)}}</span>
          </div>
          <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">60%</text>
    </svg>
          </div>
        </div>
      </div>
      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Orders</h2>
            <span>{{count($orders)}}</span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="90, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">90%</text>
    </svg>
          </div>
        </div>
      </div>

      <div class="chart-container-wrapper">
        <div class="chart-container">
          <div class="chart-info-wrapper">
            <h2>Pending</h2>
            <span>{{count($pendingOrders)}}</span>
          </div>
           <div class="chart-svg">
            <svg viewBox="0 0 36 36" class="circular-chart orange">
      <path class="circle-bg" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <path class="circle" stroke-dasharray="90, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"></path>
      <text x="18" y="20.35" class="percentage">90%</text>
    </svg>
          </div>
        </div>
      </div>
    </div>
    <div class="chart-row two">
      <div class="chart-container-wrapper big">
        <div class="chart-container">
          <div class="chart-container-header">
            <h2>Top Like Post</h2>
            <span>Last 30 days</span>
          
        </div>
          <div class="chart-container applicants">
              <!-- pass -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->



</section>
</div>
</div>
</section>
<script>
  var chart    = document.getElementById('chart').getContext('2d'),
    gradient = chart.createLinearGradient(0, 0, 0, 450);

gradient.addColorStop(0, 'rgba(0, 199, 214, 0.32)');
gradient.addColorStop(0.3, 'rgba(0, 199, 214, 0.1)');
gradient.addColorStop(1, 'rgba(0, 199, 214, 0)');


var data  = {
    labels: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October', 'November','December' ],
    datasets: [{
			label: 'Applications',
			backgroundColor: gradient,
			pointBackgroundColor: '#00c7d6',
			borderWidth: 1,
			borderColor: '#0e1a2f',
			data: [60, 45, 80, 30, 35, 55,25,80,40,50,80,50]
    }]
};

var options = {
	responsive: true,
	maintainAspectRatio: true,
	animation: {
		easing: 'easeInOutQuad',
		duration: 520
	},
	scales: {
		yAxes: [{
      ticks: {
        fontColor: '#5e6a81'
      },
			gridLines: {
				color: 'rgba(200, 200, 200, 0.08)',
				lineWidth: 1
			}
		}],
    xAxes:[{
      ticks: {
        fontColor: '#5e6a81'
      }
    }]
	},
	elements: {
		line: {
			tension: 0.4
		}
	},
	legend: {
		display: false
	},
	point: {
		backgroundColor: '#00c7d6'
	},
	tooltips: {
		titleFontFamily: 'Poppins',
		backgroundColor: 'rgba(0,0,0,0.4)',
		titleFontColor: 'white',
		caretSize: 5,
		cornerRadius: 2,
		xPadding: 10,
		yPadding: 10
	}
};

var chartInstance = new Chart(chart, {
    type: 'line',
    data: data,
		options: options
});

document.querySelector('.open-right-area').addEventListener('click', function () {
    document.querySelector('.app-right').classList.add('show');
});

document.querySelector('.close-right').addEventListener('click', function () {
    document.querySelector('.app-right').classList.remove('show');
});

document.querySelector('.menu-button').addEventListener('click', function () {
    document.querySelector('.app-left').classList.add('show');
});

document.querySelector('.close-menu').addEventListener('click', function () {
    document.querySelector('.app-left').classList.remove('show');
});
</script>
@endsection