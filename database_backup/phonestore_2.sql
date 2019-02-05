--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5
-- Dumped by pg_dump version 10.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: AmountPhoneByStore; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."AmountPhoneByStore" (
    id integer NOT NULL,
    amount integer NOT NULL,
    "phoneId" integer NOT NULL,
    "storeId" integer NOT NULL
);


ALTER TABLE public."AmountPhoneByStore" OWNER TO xeras;

--
-- Name: AmountPhoneByStore_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."AmountPhoneByStore_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."AmountPhoneByStore_id_seq" OWNER TO xeras;

--
-- Name: AmountPhoneByStore_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."AmountPhoneByStore_id_seq" OWNED BY public."AmountPhoneByStore".id;


--
-- Name: City; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."City" (
    id integer NOT NULL,
    "cityName" text NOT NULL,
    "cityOtherNames" text NOT NULL
);


ALTER TABLE public."City" OWNER TO xeras;

--
-- Name: City_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."City_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."City_id_seq" OWNER TO xeras;

--
-- Name: City_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."City_id_seq" OWNED BY public."City".id;


--
-- Name: District; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."District" (
    id integer NOT NULL,
    "districtName" text NOT NULL,
    "districtOthernames" text NOT NULL
);


ALTER TABLE public."District" OWNER TO xeras;

--
-- Name: District_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."District_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."District_id_seq" OWNER TO xeras;

--
-- Name: District_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."District_id_seq" OWNED BY public."District".id;


--
-- Name: Installment; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Installment" (
    id integer NOT NULL,
    "installmentRate" double precision NOT NULL,
    "installmentCompanyName" text NOT NULL,
    "installmentNote" text NOT NULL
);


ALTER TABLE public."Installment" OWNER TO xeras;

--
-- Name: Installment_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Installment_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Installment_id_seq" OWNER TO xeras;

--
-- Name: Installment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Installment_id_seq" OWNED BY public."Installment".id;


--
-- Name: OsType; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."OsType" (
    id integer NOT NULL,
    "osTypeName" text NOT NULL,
    "osTypeOtherNames" text NOT NULL
);


ALTER TABLE public."OsType" OWNER TO xeras;

--
-- Name: OsType_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."OsType_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."OsType_id_seq" OWNER TO xeras;

--
-- Name: OsType_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."OsType_id_seq" OWNED BY public."OsType".id;


--
-- Name: Phone; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Phone" (
    id integer NOT NULL,
    "phoneName" text NOT NULL,
    "phoneOtherNames" text NOT NULL,
    "phonePrice" double precision NOT NULL,
    "phoneEdition" text NOT NULL,
    "phoneColor" text NOT NULL,
    "phoneScreenWidth" double precision NOT NULL,
    "phoneScreenHeight" double precision NOT NULL,
    "phoneInch" double precision NOT NULL,
    "phonePin" integer NOT NULL,
    "phoneNumberOfSim" integer NOT NULL,
    "phoneMemory" integer NOT NULL,
    "phoneFrontCamera" double precision NOT NULL,
    "phoneBackCamera" double precision NOT NULL,
    "phoneCameraNote" text NOT NULL,
    "phoneInternetNote" text NOT NULL,
    "phoneTypeNote" text NOT NULL,
    "phoneDemandNote" text NOT NULL,
    "phoneRating" double precision NOT NULL,
    "phoneTopSeller" double precision NOT NULL,
    "phoneTags" text NOT NULL,
    "phoneNote" text NOT NULL,
    "phoneInstallmentId" integer NOT NULL,
    "phoneOsTypeId" integer NOT NULL,
    "phoneProducerId" integer NOT NULL,
    "phoneWarrantyId" integer NOT NULL,
    "phoneRAM" integer NOT NULL,
    "fromCountry" text NOT NULL,
    "phone3G" text NOT NULL,
    "phone4G" text NOT NULL,
    "phoneChargerTime" double precision NOT NULL,
    "phoneChargerType" text NOT NULL,
    "phoneChip" double precision NOT NULL,
    "phoneCode" text NOT NULL,
    "phoneLanguage" text NOT NULL,
    "phoneScreenType" text NOT NULL,
    "phoneTimeUsing" double precision NOT NULL,
    status text NOT NULL
);


ALTER TABLE public."Phone" OWNER TO xeras;

--
-- Name: Phone_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Phone_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Phone_id_seq" OWNER TO xeras;

--
-- Name: Phone_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Phone_id_seq" OWNED BY public."Phone".id;


--
-- Name: Producer; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Producer" (
    id integer NOT NULL,
    "producerName" text NOT NULL,
    "producerOtherNames" text NOT NULL
);


ALTER TABLE public."Producer" OWNER TO xeras;

--
-- Name: Producer_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Producer_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Producer_id_seq" OWNER TO xeras;

--
-- Name: Producer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Producer_id_seq" OWNED BY public."Producer".id;


--
-- Name: Province; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Province" (
    id integer NOT NULL,
    "provinceName" text NOT NULL,
    "provinceOtherNames" text NOT NULL
);


ALTER TABLE public."Province" OWNER TO xeras;

--
-- Name: Province_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Province_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Province_id_seq" OWNER TO xeras;

--
-- Name: Province_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Province_id_seq" OWNED BY public."Province".id;


--
-- Name: ReceivedTime; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."ReceivedTime" (
    id integer NOT NULL,
    "receivedTime" date,
    "phoneId" integer NOT NULL,
    "storeId" integer NOT NULL
);


ALTER TABLE public."ReceivedTime" OWNER TO xeras;

--
-- Name: ReceivedTime_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."ReceivedTime_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."ReceivedTime_id_seq" OWNER TO xeras;

--
-- Name: ReceivedTime_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."ReceivedTime_id_seq" OWNED BY public."ReceivedTime".id;


--
-- Name: Resell; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Resell" (
    id integer NOT NULL,
    "resellName" text NOT NULL,
    "dateStart" date NOT NULL,
    "dateEnd" date NOT NULL,
    other text NOT NULL,
    "phoneId" integer NOT NULL
);


ALTER TABLE public."Resell" OWNER TO xeras;

--
-- Name: Resell_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Resell_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Resell_id_seq" OWNER TO xeras;

--
-- Name: Resell_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Resell_id_seq" OWNED BY public."Resell".id;


--
-- Name: SaleOff; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."SaleOff" (
    id integer NOT NULL,
    "saleOffName" text NOT NULL,
    "saleOffDateStart" date NOT NULL,
    "saleOffDateEnd" date NOT NULL,
    "saleOffPricePercentage" double precision NOT NULL,
    "saleOffPriceReduce" double precision NOT NULL,
    "saleOffNote" text NOT NULL,
    "saleOffPhoneId" integer NOT NULL
);


ALTER TABLE public."SaleOff" OWNER TO xeras;

--
-- Name: SaleOff_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."SaleOff_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."SaleOff_id_seq" OWNER TO xeras;

--
-- Name: SaleOff_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."SaleOff_id_seq" OWNED BY public."SaleOff".id;


--
-- Name: Store; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Store" (
    id integer NOT NULL,
    "storeName" text NOT NULL,
    "storeAddress" text NOT NULL,
    "storeNote" text NOT NULL,
    "storeCityId" integer NOT NULL,
    "storeDistrictId" integer NOT NULL,
    "storeProvinceId" integer NOT NULL,
    "storePayment" text NOT NULL
);


ALTER TABLE public."Store" OWNER TO xeras;

--
-- Name: Store_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Store_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Store_id_seq" OWNER TO xeras;

--
-- Name: Store_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Store_id_seq" OWNED BY public."Store".id;


--
-- Name: Warranty; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Warranty" (
    id integer NOT NULL,
    "warrantyType" text NOT NULL,
    "warrantyDuration" double precision NOT NULL,
    "warrantyTerms" text NOT NULL,
    "warrantyNote" text NOT NULL
);


ALTER TABLE public."Warranty" OWNER TO xeras;

--
-- Name: Warranty_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Warranty_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Warranty_id_seq" OWNER TO xeras;

--
-- Name: Warranty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Warranty_id_seq" OWNED BY public."Warranty".id;


--
-- Name: auth_group; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_group (
    id integer NOT NULL,
    name character varying(80) NOT NULL
);


ALTER TABLE public.auth_group OWNER TO xeras;

--
-- Name: auth_group_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_group_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_group_id_seq OWNER TO xeras;

--
-- Name: auth_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_group_id_seq OWNED BY public.auth_group.id;


--
-- Name: auth_group_permissions; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_group_permissions (
    id integer NOT NULL,
    group_id integer NOT NULL,
    permission_id integer NOT NULL
);


ALTER TABLE public.auth_group_permissions OWNER TO xeras;

--
-- Name: auth_group_permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_group_permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_group_permissions_id_seq OWNER TO xeras;

--
-- Name: auth_group_permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_group_permissions_id_seq OWNED BY public.auth_group_permissions.id;


--
-- Name: auth_permission; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_permission (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    content_type_id integer NOT NULL,
    codename character varying(100) NOT NULL
);


ALTER TABLE public.auth_permission OWNER TO xeras;

--
-- Name: auth_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_permission_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_permission_id_seq OWNER TO xeras;

--
-- Name: auth_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_permission_id_seq OWNED BY public.auth_permission.id;


--
-- Name: auth_user; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_user (
    id integer NOT NULL,
    password character varying(128) NOT NULL,
    last_login timestamp with time zone,
    is_superuser boolean NOT NULL,
    username character varying(150) NOT NULL,
    first_name character varying(30) NOT NULL,
    last_name character varying(150) NOT NULL,
    email character varying(254) NOT NULL,
    is_staff boolean NOT NULL,
    is_active boolean NOT NULL,
    date_joined timestamp with time zone NOT NULL
);


ALTER TABLE public.auth_user OWNER TO xeras;

--
-- Name: auth_user_groups; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_user_groups (
    id integer NOT NULL,
    user_id integer NOT NULL,
    group_id integer NOT NULL
);


ALTER TABLE public.auth_user_groups OWNER TO xeras;

--
-- Name: auth_user_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_user_groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_user_groups_id_seq OWNER TO xeras;

--
-- Name: auth_user_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_user_groups_id_seq OWNED BY public.auth_user_groups.id;


--
-- Name: auth_user_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_user_id_seq OWNER TO xeras;

--
-- Name: auth_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_user_id_seq OWNED BY public.auth_user.id;


--
-- Name: auth_user_user_permissions; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.auth_user_user_permissions (
    id integer NOT NULL,
    user_id integer NOT NULL,
    permission_id integer NOT NULL
);


ALTER TABLE public.auth_user_user_permissions OWNER TO xeras;

--
-- Name: auth_user_user_permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.auth_user_user_permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auth_user_user_permissions_id_seq OWNER TO xeras;

--
-- Name: auth_user_user_permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.auth_user_user_permissions_id_seq OWNED BY public.auth_user_user_permissions.id;


--
-- Name: django_admin_log; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.django_admin_log (
    id integer NOT NULL,
    action_time timestamp with time zone NOT NULL,
    object_id text,
    object_repr character varying(200) NOT NULL,
    action_flag smallint NOT NULL,
    change_message text NOT NULL,
    content_type_id integer,
    user_id integer NOT NULL,
    CONSTRAINT django_admin_log_action_flag_check CHECK ((action_flag >= 0))
);


ALTER TABLE public.django_admin_log OWNER TO xeras;

--
-- Name: django_admin_log_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.django_admin_log_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.django_admin_log_id_seq OWNER TO xeras;

--
-- Name: django_admin_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.django_admin_log_id_seq OWNED BY public.django_admin_log.id;


--
-- Name: django_content_type; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.django_content_type (
    id integer NOT NULL,
    app_label character varying(100) NOT NULL,
    model character varying(100) NOT NULL
);


ALTER TABLE public.django_content_type OWNER TO xeras;

--
-- Name: django_content_type_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.django_content_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.django_content_type_id_seq OWNER TO xeras;

--
-- Name: django_content_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.django_content_type_id_seq OWNED BY public.django_content_type.id;


--
-- Name: django_migrations; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.django_migrations (
    id integer NOT NULL,
    app character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    applied timestamp with time zone NOT NULL
);


ALTER TABLE public.django_migrations OWNER TO xeras;

--
-- Name: django_migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public.django_migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.django_migrations_id_seq OWNER TO xeras;

--
-- Name: django_migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public.django_migrations_id_seq OWNED BY public.django_migrations.id;


--
-- Name: django_session; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public.django_session (
    session_key character varying(40) NOT NULL,
    session_data text NOT NULL,
    expire_date timestamp with time zone NOT NULL
);


ALTER TABLE public.django_session OWNER TO xeras;

--
-- Name: AmountPhoneByStore id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."AmountPhoneByStore" ALTER COLUMN id SET DEFAULT nextval('public."AmountPhoneByStore_id_seq"'::regclass);


--
-- Name: City id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."City" ALTER COLUMN id SET DEFAULT nextval('public."City_id_seq"'::regclass);


--
-- Name: District id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."District" ALTER COLUMN id SET DEFAULT nextval('public."District_id_seq"'::regclass);


--
-- Name: Installment id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment" ALTER COLUMN id SET DEFAULT nextval('public."Installment_id_seq"'::regclass);


--
-- Name: OsType id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."OsType" ALTER COLUMN id SET DEFAULT nextval('public."OsType_id_seq"'::regclass);


--
-- Name: Phone id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone" ALTER COLUMN id SET DEFAULT nextval('public."Phone_id_seq"'::regclass);


--
-- Name: Producer id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Producer" ALTER COLUMN id SET DEFAULT nextval('public."Producer_id_seq"'::regclass);


--
-- Name: Province id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Province" ALTER COLUMN id SET DEFAULT nextval('public."Province_id_seq"'::regclass);


--
-- Name: ReceivedTime id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."ReceivedTime" ALTER COLUMN id SET DEFAULT nextval('public."ReceivedTime_id_seq"'::regclass);


--
-- Name: Resell id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Resell" ALTER COLUMN id SET DEFAULT nextval('public."Resell_id_seq"'::regclass);


--
-- Name: SaleOff id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff" ALTER COLUMN id SET DEFAULT nextval('public."SaleOff_id_seq"'::regclass);


--
-- Name: Store id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store" ALTER COLUMN id SET DEFAULT nextval('public."Store_id_seq"'::regclass);


--
-- Name: Warranty id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Warranty" ALTER COLUMN id SET DEFAULT nextval('public."Warranty_id_seq"'::regclass);


--
-- Name: auth_group id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group ALTER COLUMN id SET DEFAULT nextval('public.auth_group_id_seq'::regclass);


--
-- Name: auth_group_permissions id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group_permissions ALTER COLUMN id SET DEFAULT nextval('public.auth_group_permissions_id_seq'::regclass);


--
-- Name: auth_permission id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_permission ALTER COLUMN id SET DEFAULT nextval('public.auth_permission_id_seq'::regclass);


--
-- Name: auth_user id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user ALTER COLUMN id SET DEFAULT nextval('public.auth_user_id_seq'::regclass);


--
-- Name: auth_user_groups id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_groups ALTER COLUMN id SET DEFAULT nextval('public.auth_user_groups_id_seq'::regclass);


--
-- Name: auth_user_user_permissions id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_user_permissions ALTER COLUMN id SET DEFAULT nextval('public.auth_user_user_permissions_id_seq'::regclass);


--
-- Name: django_admin_log id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_admin_log ALTER COLUMN id SET DEFAULT nextval('public.django_admin_log_id_seq'::regclass);


--
-- Name: django_content_type id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_content_type ALTER COLUMN id SET DEFAULT nextval('public.django_content_type_id_seq'::regclass);


--
-- Name: django_migrations id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_migrations ALTER COLUMN id SET DEFAULT nextval('public.django_migrations_id_seq'::regclass);


--
-- Data for Name: AmountPhoneByStore; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."AmountPhoneByStore" (id, amount, "phoneId", "storeId") FROM stdin;
1	32	1	1
2	6	2	7
3	12	3	22
\.


--
-- Data for Name: City; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."City" (id, "cityName", "cityOtherNames") FROM stdin;
1	Hồ Chí Minh	HCM, tp hcm, TP HCM, TP hcm
2	Hà Nội	hà nội, hn, HN
\.


--
-- Data for Name: District; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."District" (id, "districtName", "districtOthernames") FROM stdin;
1	Quận 3	q3, quận 3, 3
3	H. Bình Chánh	Bình Chánh, bình chánh, bc
4	Quận Hoàn Kiếm	hoàn kiếm
5	Quận 4	q4, quận 4, 4
6	Quận 5	q5, quận 5, 5
7	Quận 6	q6, quận 6, 6
8	Quận 7	q7, quận 7, 7
9	Quận 8	q8, quận 8, 8
10	Quận 9	q9, quận 9, 9
11	Quận 10	q10, quận 10, 10
12	Quận 11	q11, quận 11, 11
13	Quận 12	q12, quận 12, 12
14	Quận Gò Vấp	gò vấp
15	Quận Bình Thạnh	bình thạnh, bình thạch
16	Quận Thủ Đức	thủ đức
17	Quận Thanh Xuân	thanh xuân
18	Quận Hai Bà Trưng	ha bà trưng, htr
19	Quận Cầu Giấy	cầu giấy
20	Quận Thanh Xuân	thanh xuân
21	Quận Trương Định	trương định
22	Quận Dịch Vọng	dịch vọng
23	Quận Hàng Bài	hàng bài
24	Quận Đống Đa	đống đa
25	Quận Long Biên	long biên
26	Quận 1	q1, Q 1, quan 1
27	Quận Tân Bình	tân bình, tb
28	Quận Phú Nhuận	phú nhuận
\.


--
-- Data for Name: Installment; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Installment" (id, "installmentRate", "installmentCompanyName", "installmentNote") FROM stdin;
1	1	FE CREDIT	chi tiết tại https://fecredit.com.vn/
\.


--
-- Data for Name: OsType; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."OsType" (id, "osTypeName", "osTypeOtherNames") FROM stdin;
1	IOS 12	ios12, ios 12
3	IOS 11	ios11, ios 11
4	IOS 10	ios10, ios 10
5	IOS 9	ios9, ios 9
2	Android 7.1	android
6	Android 8.1	android
7	Android 8.0	android 8.0
8	Android 8.1	android 8.1
\.


--
-- Data for Name: Phone; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Phone" (id, "phoneName", "phoneOtherNames", "phonePrice", "phoneEdition", "phoneColor", "phoneScreenWidth", "phoneScreenHeight", "phoneInch", "phonePin", "phoneNumberOfSim", "phoneMemory", "phoneFrontCamera", "phoneBackCamera", "phoneCameraNote", "phoneInternetNote", "phoneTypeNote", "phoneDemandNote", "phoneRating", "phoneTopSeller", "phoneTags", "phoneNote", "phoneInstallmentId", "phoneOsTypeId", "phoneProducerId", "phoneWarrantyId", "phoneRAM", "fromCountry", "phone3G", "phone4G", "phoneChargerTime", "phoneChargerType", "phoneChip", "phoneCode", "phoneLanguage", "phoneScreenType", "phoneTimeUsing", status) FROM stdin;
3	Iphone xs max	ip xs max	35.5	Quốc tế	Bạc, Xám, Vàng	157.5	77.4000000000000057	6.5	2716	1	256	7	12	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps		SmartPhone	Liên quân,mượt; alpha 8,chơi mượt	4.5	9	Iphone XS max, Ip xs max	Nhập khẩu	1	1	1	1	4	Mỹ	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2	2 chấu	2		tiếng Việt	OLED	2	Mới 100%
2	Iphone 8	ip 8	18.1999999999999993	Quốc tế	Bạc, Xám, Vàng	138.400000000000006	67.2999999999999972	4.70000000000000018	1821	1	256	7	12	2160p@24/30/60fps, 1080p@30/60/120/240fps		SmartPhone	Liên quân,mượt; alpha 8,chơi mượt	4.5	9	Iphone 8, Ip 8	Nhập khẩu	1	3	1	1	2	Mỹ	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2	2 chấu	2		Việt Nam	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	2	Mới 100%
1	Iphone X	ip x	20.6999999999999993	Quốc tế	Bạc, Xám, Vàng	143.599999999999994	70.9000000000000057	5.79999999999999982	2716	1	64	7	12	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	SmartPhone	Liên quân,mượt; alpha 8,chơi mượt	4.5	9	Iphone X, Ip x	Nhập khẩu	1	1	1	1	2	Mỹ			2	2 chấu	2				2	
\.


--
-- Data for Name: Producer; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Producer" (id, "producerName", "producerOtherNames") FROM stdin;
1	Apple	apple, táo, TÁO, Táo
2	Samsung	samsung, ss, SAMSUNG
3	Xiaomi	xiaomi, XIAOMI
4	Asus	asus, ASUS
\.


--
-- Data for Name: Province; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Province" (id, "provinceName", "provinceOtherNames") FROM stdin;
1	Miền Nam	mn, miền nam
2	Hồ Chí Minh	hcm, HCM, tp hcm, tp HCM, TPHCM, TP HCM
3	Hà Nội	hà nội, HN
4	Miền Bắc	miền bắc
\.


--
-- Data for Name: ReceivedTime; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."ReceivedTime" (id, "receivedTime", "phoneId", "storeId") FROM stdin;
2	2019-01-31	3	20
\.


--
-- Data for Name: Resell; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Resell" (id, "resellName", "dateStart", "dateEnd", other, "phoneId") FROM stdin;
1	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR	2019-01-21	2019-01-31	Tất cả các chức năng đều hoạt động bình thường.\r\nMáy không cần có hộp, không cần có phụ kiện đi kèm hộp (tai nghe, cáp sạc, củ sạc…)\r\nMáy có thể mở, tắt nguồn và cắm sạc pin bình thường Máy không bị biến dạng (cong, vẹo)\r\nMáy đã được tắt/ ngắt hoạt động và log out khỏi tất cả các tính năng bảo mật máy và khóa máy từ xa (ví dụ như iCloud ...)\r\nMàn hình của máy vẫn hoạt động tốt, nếu có lỗi sẽ định giá riêng\r\nChấp nhận cả máy xách tay.	3
\.


--
-- Data for Name: SaleOff; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."SaleOff" (id, "saleOffName", "saleOffDateStart", "saleOffDateEnd", "saleOffPricePercentage", "saleOffPriceReduce", "saleOffNote", "saleOffPhoneId") FROM stdin;
1	Giảm giá bao ốp da khi mua điện thoại Iphone X	2018-12-11	2018-12-20	10	0	Giảm 10% giá bao da, ốp, miếng dán	1
\.


--
-- Data for Name: Store; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Store" (id, "storeName", "storeAddress", "storeNote", "storeCityId", "storeDistrictId", "storeProvinceId", "storePayment") FROM stdin;
1	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	114 Phan Đăng Lưu, phường 3, Phú Nhuận		1	1	1	
2	CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	Thanh toán bằng tiền mặt	1	3	1	
3	CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp	59 Quang Trung, P. 10, Q. Gò Vấp	Thanh toán bằng tiền mặt	1	14	1	
4	CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	Thanh toán bằng tiền mặt	1	13	1	
5	CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1	55B Trần Quang Khải, P. Tân Định, Q. 1	Thanh toán bằng tiền mặt	1	26	1	
6	CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	Thanh toán bằng tiền mặt	1	15	1	
7	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	Thanh toán bằng tiền mặt	1	14	1	
8	CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	Thanh toán bằng tiền mặt	1	16	1	
9	CellphoneS 288 Đường 3/2, P. 12, Q. 10	288 Đường 3/2, P. 12, Q. 10	Thanh toán bằng tiền mặt	1	11	1	
10	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	125 Lê Văn Việt, P. Hiệp Phú, Q. 9	Thanh toán bằng tiền mặt	1	10	1	
11	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	1075B Hậu Giang, P. 11, Q. 6	Thanh toán bằng tiền mặt	1	7	1	
12	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3	363 Võ Văn Tần, P. 5, Q. 3	Thanh toán bằng tiền mặt	1	1	1	
13	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	Thanh toán bằng tiền mặt	1	8	1	
14	CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9	243 Đỗ Xuân Hợp, Phước Long B, Quận 9	Thanh toán bằng tiền mặt	1	10	1	
15	CellphoneS 177 Khánh Hội, P. 3, Q. 4	177 Khánh Hội, P. 3, Q. 4	Thanh toán bằng tiền mặt	1	5	1	
16	Hồ Chí Minh - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	Thanh toán bằng tiền mặt	1	26	1	
17	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	Thanh toán bằng tiền mặt	1	26	1	
18	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	125 Lê Văn Việt, P. Hiệp Phú, Q. 9	Thanh toán bằng tiền mặt	1	10	1	
19	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	1075B Hậu Giang, P. 11, Q. 6	Thanh toán bằng tiền mặt	1	7	1	
20	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	4B Cộng Hoà, P. 4, Q. Tân Bình	Thanh toán bằng tiền mặt	1	27	1	
21	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	114 Phan Đăng Lưu, phường 3, Phú Nhuận	Thanh toán bằng tiền mặt	1	28	1	
22	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình	Thanh toán bằng tiền mặt672-674 Âu Cơ, P. 14, Q. Tân Bình	Thanh toán bằng tiền mặt	1	27	1	
23	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	Thanh toán bằng tiền mặt	2	20	4	
24	CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	Thanh toán bằng tiền mặt	2	18	4	
25	CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	Thanh toán bằng tiền mặt	2	19	4	
26	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	Thanh toán bằng tiền mặt	2	19	4	
27	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	Thanh toán bằng tiền mặt	2	4	4	
28	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội	212 Khương Đình, Thanh Xuân, Hà Nội	Thanh toán bằng tiền mặt	2	20	4	
29	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa	21 Thái Hà, P. Trung Liệt, Q. Đống Đa	Thanh toán bằng tiền mặt	2	24	4	
30	CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	Thanh toán bằng tiền mặt	2	19	4	
31	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa	117 Thái Hà, P. Trung Liệt, Q. Đống Đa	Thanh toán bằng tiền mặt	2	24	4	
32	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	Thanh toán bằng tiền mặt	2	25	4	
\.


--
-- Data for Name: Warranty; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Warranty" (id, "warrantyType", "warrantyDuration", "warrantyTerms", "warrantyNote") FROM stdin;
1	Bảo hành điện thoại	1	Được bảo hành nếu máy không bị rơi vỡ, vào nước.	Được bảo hành nếu máy không bị rơi vỡ, vào nước.
\.


--
-- Data for Name: auth_group; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_group (id, name) FROM stdin;
\.


--
-- Data for Name: auth_group_permissions; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_group_permissions (id, group_id, permission_id) FROM stdin;
\.


--
-- Data for Name: auth_permission; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_permission (id, name, content_type_id, codename) FROM stdin;
1	Can add log entry	1	add_logentry
2	Can change log entry	1	change_logentry
3	Can delete log entry	1	delete_logentry
4	Can view log entry	1	view_logentry
5	Can add permission	2	add_permission
6	Can change permission	2	change_permission
7	Can delete permission	2	delete_permission
8	Can view permission	2	view_permission
9	Can add group	3	add_group
10	Can change group	3	change_group
11	Can delete group	3	delete_group
12	Can view group	3	view_group
13	Can add user	4	add_user
14	Can change user	4	change_user
15	Can delete user	4	delete_user
16	Can view user	4	view_user
17	Can add content type	5	add_contenttype
18	Can change content type	5	change_contenttype
19	Can delete content type	5	delete_contenttype
20	Can view content type	5	view_contenttype
21	Can add session	6	add_session
22	Can change session	6	change_session
23	Can delete session	6	delete_session
24	Can view session	6	view_session
25	Can add amount phone by store	7	add_amountphonebystore
26	Can change amount phone by store	7	change_amountphonebystore
27	Can delete amount phone by store	7	delete_amountphonebystore
28	Can view amount phone by store	7	view_amountphonebystore
29	Can add city	8	add_city
30	Can change city	8	change_city
31	Can delete city	8	delete_city
32	Can view city	8	view_city
33	Can add district	9	add_district
34	Can change district	9	change_district
35	Can delete district	9	delete_district
36	Can view district	9	view_district
37	Can add installment	10	add_installment
38	Can change installment	10	change_installment
39	Can delete installment	10	delete_installment
40	Can view installment	10	view_installment
41	Can add os type	11	add_ostype
42	Can change os type	11	change_ostype
43	Can delete os type	11	delete_ostype
44	Can view os type	11	view_ostype
45	Can add phone	12	add_phone
46	Can change phone	12	change_phone
47	Can delete phone	12	delete_phone
48	Can view phone	12	view_phone
49	Can add producer	13	add_producer
50	Can change producer	13	change_producer
51	Can delete producer	13	delete_producer
52	Can view producer	13	view_producer
53	Can add province	14	add_province
54	Can change province	14	change_province
55	Can delete province	14	delete_province
56	Can view province	14	view_province
57	Can add sale off	15	add_saleoff
58	Can change sale off	15	change_saleoff
59	Can delete sale off	15	delete_saleoff
60	Can view sale off	15	view_saleoff
61	Can add store	16	add_store
62	Can change store	16	change_store
63	Can delete store	16	delete_store
64	Can view store	16	view_store
65	Can add warranty	17	add_warranty
66	Can change warranty	17	change_warranty
67	Can delete warranty	17	delete_warranty
68	Can view warranty	17	view_warranty
69	Can add received time	18	add_receivedtime
70	Can change received time	18	change_receivedtime
71	Can delete received time	18	delete_receivedtime
72	Can view received time	18	view_receivedtime
73	Can add resell	19	add_resell
74	Can change resell	19	change_resell
75	Can delete resell	19	delete_resell
76	Can view resell	19	view_resell
\.


--
-- Data for Name: auth_user; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_user (id, password, last_login, is_superuser, username, first_name, last_name, email, is_staff, is_active, date_joined) FROM stdin;
1	pbkdf2_sha256$120000$ABZwEoupSC1l$Lsypt4N8pRZVVxVq5y//9gYiuEANDrgqx6ODy1cUats=	2018-12-11 17:29:02.634567+07	t	congtran			minhcongkun@gmail.com	t	t	2018-12-11 17:08:37.741509+07
2	pbkdf2_sha256$120000$o2B9hDK81yD3$P2qvTW+WuIF5KRamqGkdb8h2CbxQQcE0hy4w/diKYII=	2019-01-22 08:38:29.746402+07	t	keobeo			minhcongkun@gmail.com	t	t	2018-12-11 17:32:25.260183+07
\.


--
-- Data for Name: auth_user_groups; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_user_groups (id, user_id, group_id) FROM stdin;
\.


--
-- Data for Name: auth_user_user_permissions; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_user_user_permissions (id, user_id, permission_id) FROM stdin;
\.


--
-- Data for Name: django_admin_log; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_admin_log (id, action_time, object_id, object_repr, action_flag, change_message, content_type_id, user_id) FROM stdin;
1	2018-12-11 17:12:39.400282+07	1	City object (1)	1	[{"added": {}}]	8	1
2	2018-12-11 17:13:55.163008+07	1	District object (1)	1	[{"added": {}}]	9	1
3	2018-12-11 17:16:14.185551+07	1	Miền Nam	1	[{"added": {}}]	14	1
4	2018-12-11 17:16:47.139432+07	2	Hồ Chí Minh	1	[{"added": {}}]	14	1
5	2018-12-11 17:18:11.413066+07	1	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - Hồ Chí Minh	1	[{"added": {}}]	16	1
6	2018-12-11 17:18:20.462873+07	1	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - Hồ Chí Minh	2	[]	16	1
7	2018-12-11 17:28:12.505359+07	1	FE CREDIT	1	[{"added": {}}]	10	1
8	2018-12-11 17:28:43.957227+07	1	IOS 12	1	[{"added": {}}]	11	1
9	2018-12-11 17:30:05.948833+07	1	Bảo hành điện thoại	1	[{"added": {}}]	17	1
10	2018-12-11 17:30:56.077976+07	1	Apple	1	[{"added": {}}]	13	1
11	2018-12-11 18:00:44.732206+07	1	Iphone X - 64.0 - 3.0	1	[{"added": {}}]	12	2
12	2018-12-11 18:04:47.123573+07	1	SaleOff object (1)	1	[{"added": {}}]	15	2
13	2018-12-11 18:08:41.82642+07	1	store: CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - phone: Iphone X - amount: 32	1	[{"added": {}}]	7	2
14	2018-12-11 18:13:32.182312+07	2	Hà Nội	1	[{"added": {}}]	8	2
15	2018-12-11 18:14:12.554662+07	2	H. Bình Chánh	1	[{"added": {}}]	9	2
16	2018-12-11 18:14:12.614078+07	3	H. Bình Chánh	1	[{"added": {}}]	9	2
17	2018-12-11 18:14:20.621129+07	2	H. Bình Chánh	3		9	2
18	2018-12-11 18:14:38.854198+07	4	Gò Vấp	1	[{"added": {}}]	9	2
19	2018-12-11 18:14:57.166594+07	4	Quận 12	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
20	2018-12-11 18:15:14.925142+07	4	Quận 1	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
21	2018-12-11 18:15:37.168764+07	4	Quận Bình Thạnh	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
22	2018-12-11 18:16:00.298179+07	4	Quận Thủ Đức	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
23	2018-12-11 18:16:21.660275+07	4	Quận 9	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
24	2018-12-11 18:16:42.225428+07	4	Quận 6	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
25	2018-12-11 18:16:58.711364+07	4	Quận Thanh Xuân	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
26	2018-12-11 18:17:17.402653+07	4	Quận Hai Bà Trưng	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
27	2018-12-11 18:17:34.952335+07	4	Quận Cầu Giấy	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
28	2018-12-11 18:17:57.374813+07	4	Quận Hoàn Kiếm	2	[{"changed": {"fields": ["districtName", "districtOthernames"]}}]	9	2
29	2018-12-11 18:18:33.894252+07	5	Quận 4	1	[{"added": {}}]	9	2
30	2018-12-11 18:18:46.898349+07	6	Quận 5	1	[{"added": {}}]	9	2
31	2018-12-11 18:18:56.474084+07	7	Quận 6	1	[{"added": {}}]	9	2
32	2018-12-11 18:19:08.833775+07	8	Quận 7	1	[{"added": {}}]	9	2
33	2018-12-11 18:19:20.404603+07	9	Quận 8	1	[{"added": {}}]	9	2
34	2018-12-11 18:19:29.019086+07	10	Quận 9	1	[{"added": {}}]	9	2
35	2018-12-11 18:19:38.845358+07	11	Quận 10	1	[{"added": {}}]	9	2
36	2018-12-11 18:19:50.168174+07	12	Quận 11	1	[{"added": {}}]	9	2
37	2018-12-11 18:20:02.89307+07	13	Quận 12	1	[{"added": {}}]	9	2
38	2018-12-11 18:20:26.121937+07	14	Quận Gò Vấp	1	[{"added": {}}]	9	2
39	2018-12-11 18:20:47.327393+07	15	Quận Bình Thạnh	1	[{"added": {}}]	9	2
40	2018-12-11 18:21:01.843472+07	16	Quận Thủ Đức	1	[{"added": {}}]	9	2
41	2018-12-11 18:21:13.595316+07	17	Quận Thanh Xuân	1	[{"added": {}}]	9	2
42	2018-12-11 18:21:33.464823+07	18	Quận Hai Bà Trưng	1	[{"added": {}}]	9	2
43	2018-12-11 18:21:45.174726+07	19	Quận Cầu Giấy	1	[{"added": {}}]	9	2
44	2018-12-11 18:22:14.966282+07	20	Quận Thanh Xuân	1	[{"added": {}}]	9	2
45	2018-12-11 18:22:39.760647+07	21	Quận Trương Định	1	[{"added": {}}]	9	2
46	2018-12-11 18:22:50.476266+07	22	Quận Dịch Vọng	1	[{"added": {}}]	9	2
47	2018-12-11 18:23:09.796227+07	23	Quận Hàng Bài	1	[{"added": {}}]	9	2
48	2018-12-11 18:23:33.525552+07	24	Quận Đống Đa	1	[{"added": {}}]	9	2
49	2018-12-11 18:23:42.650322+07	25	Quận Long Biên	1	[{"added": {}}]	9	2
50	2018-12-11 18:24:10.396278+07	3	Hà Nội	1	[{"added": {}}]	14	2
51	2018-12-11 18:24:29.124767+07	4	Miền Bắc	1	[{"added": {}}]	14	2
52	2018-12-11 18:24:55.46087+07	2	Android	1	[{"added": {}}]	11	2
53	2018-12-11 18:25:58.728124+07	3	IOS 11	1	[{"added": {}}]	11	2
54	2018-12-11 18:26:07.538406+07	4	IOS 10	1	[{"added": {}}]	11	2
55	2018-12-11 18:26:18.656933+07	5	IOS 9	1	[{"added": {}}]	11	2
56	2018-12-11 18:26:31.991174+07	2	Android 7.1	2	[{"changed": {"fields": ["osTypeName"]}}]	11	2
57	2018-12-11 18:26:39.242394+07	6	Android 8.1	1	[{"added": {}}]	11	2
58	2018-12-11 18:26:48.201773+07	7	Android 8.0	1	[{"added": {}}]	11	2
59	2018-12-11 18:26:58.014594+07	8	Android 8.1	1	[{"added": {}}]	11	2
60	2018-12-11 18:27:46.970375+07	2	SAMSUNG	1	[{"added": {}}]	13	2
61	2018-12-11 18:28:02.064519+07	3	XIAOMI	1	[{"added": {}}]	13	2
62	2018-12-11 18:28:08.942396+07	4	ASUS	1	[{"added": {}}]	13	2
63	2018-12-11 18:28:37.239842+07	2	Samsung	2	[{"changed": {"fields": ["producerName", "producerOtherNames"]}}]	13	2
64	2018-12-11 18:28:48.020813+07	3	Xiaomi	2	[{"changed": {"fields": ["producerName", "producerOtherNames"]}}]	13	2
65	2018-12-11 18:28:59.836313+07	4	Asus	2	[{"changed": {"fields": ["producerName", "producerOtherNames"]}}]	13	2
66	2018-12-11 18:30:26.03988+07	2	CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh - Hồ Chí Minh	1	[{"added": {}}]	16	2
67	2018-12-11 18:30:55.569577+07	3	CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - Hồ Chí Minh	1	[{"added": {}}]	16	2
68	2018-12-11 18:31:29.454517+07	4	CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây - Hồ Chí Minh	1	[{"added": {}}]	16	2
69	2018-12-11 18:31:57.865015+07	26	Quận 1	1	[{"added": {}}]	9	2
70	2018-12-11 18:32:13.274714+07	5	CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1 - Hồ Chí Minh	1	[{"added": {}}]	16	2
71	2018-12-11 18:32:35.942043+07	6	CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh - Hồ Chí Minh	1	[{"added": {}}]	16	2
72	2018-12-11 18:32:59.417387+07	7	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp - Hồ Chí Minh	1	[{"added": {}}]	16	2
73	2018-12-11 18:33:21.599694+07	8	CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức - Hồ Chí Minh	1	[{"added": {}}]	16	2
74	2018-12-11 18:33:41.13313+07	9	CellphoneS 288 Đường 3/2, P. 12, Q. 10 - Hồ Chí Minh	1	[{"added": {}}]	16	2
75	2018-12-11 18:34:13.604975+07	10	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - Hồ Chí Minh	1	[{"added": {}}]	16	2
76	2018-12-11 18:34:33.211578+07	11	CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - Hồ Chí Minh	1	[{"added": {}}]	16	2
77	2018-12-11 18:35:00.056158+07	12	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - Hồ Chí Minh	1	[{"added": {}}]	16	2
78	2018-12-11 18:35:20.107274+07	13	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - Hồ Chí Minh	1	[{"added": {}}]	16	2
79	2018-12-11 18:35:40.371094+07	14	CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - Hồ Chí Minh	1	[{"added": {}}]	16	2
80	2018-12-11 18:36:06.155511+07	15	CellphoneS 177 Khánh Hội, P. 3, Q. 4 - Hồ Chí Minh	1	[{"added": {}}]	16	2
81	2018-12-11 18:37:04.650682+07	16	Hồ Chí Minh - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - Hồ Chí Minh	1	[{"added": {}}]	16	2
82	2018-12-11 18:37:30.527449+07	17	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - Hồ Chí Minh	1	[{"added": {}}]	16	2
83	2018-12-11 18:37:50.77808+07	18	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - Hồ Chí Minh	1	[{"added": {}}]	16	2
84	2018-12-11 18:38:16.648682+07	19	CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - Hồ Chí Minh	1	[{"added": {}}]	16	2
85	2018-12-11 18:38:39.40625+07	27	Tân Bình	1	[{"added": {}}]	9	2
86	2018-12-11 18:38:49.081588+07	20	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - Hồ Chí Minh	1	[{"added": {}}]	16	2
87	2018-12-11 18:39:15.155224+07	28	Phú Nhuận	1	[{"added": {}}]	9	2
88	2018-12-11 18:39:23.692353+07	21	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - Hồ Chí Minh	1	[{"added": {}}]	16	2
89	2018-12-11 18:39:52.725803+07	27	Quận Tân Bình	2	[{"changed": {"fields": ["districtName"]}}]	9	2
90	2018-12-11 18:39:55.885068+07	27	Quận Tân Bình	2	[]	9	2
91	2018-12-11 18:39:55.889633+07	27	Quận Tân Bình	2	[]	9	2
92	2018-12-11 18:40:02.824939+07	28	Quận Phú Nhuận	2	[{"changed": {"fields": ["districtName"]}}]	9	2
93	2018-12-11 18:40:17.718924+07	22	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - Hồ Chí Minh	1	[{"added": {}}]	16	2
94	2018-12-11 18:40:46.90035+07	23	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - Hà Nội	1	[{"added": {}}]	16	2
95	2018-12-11 18:41:06.622909+07	24	CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - Hà Nội	1	[{"added": {}}]	16	2
96	2018-12-11 18:41:26.442369+07	25	CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - Hà Nội	1	[{"added": {}}]	16	2
97	2018-12-11 18:42:07.26144+07	26	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - Hà Nội	1	[{"added": {}}]	16	2
98	2018-12-11 18:42:27.635608+07	27	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - Hà Nội	1	[{"added": {}}]	16	2
99	2018-12-11 18:42:45.71843+07	28	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - Hà Nội	1	[{"added": {}}]	16	2
100	2018-12-11 18:43:13.151273+07	29	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - Hà Nội	1	[{"added": {}}]	16	2
101	2018-12-11 18:43:37.311921+07	30	CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - Hà Nội	1	[{"added": {}}]	16	2
102	2018-12-11 18:44:07.07935+07	31	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - Hà Nội	1	[{"added": {}}]	16	2
103	2018-12-11 18:44:43.149347+07	32	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - Hà Nội	1	[{"added": {}}]	16	2
104	2019-01-20 01:48:52.876011+07	2	Iphone 8 - ROM:64 - RAM:2	1	[{"added": {}}]	12	2
105	2019-01-20 01:49:25.197486+07	2	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp - Iphone 8 - amount: 6	1	[{"added": {}}]	7	2
106	2019-01-20 01:55:37.946685+07	3	Iphone xs max - ROM:256 - RAM:4	1	[{"added": {}}]	12	2
107	2019-01-20 01:55:51.414458+07	3	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - Iphone xs max - amount: 12	1	[{"added": {}}]	7	2
108	2019-01-20 02:10:51.498566+07	2	Iphone 8 - ROM:256 - RAM:2	2	[{"changed": {"fields": ["phoneMemory"]}}]	12	2
109	2019-01-20 02:11:25.99311+07	1	Iphone X - ROM:256 - RAM:3	2	[{"changed": {"fields": ["phoneMemory"]}}]	12	2
110	2019-01-20 02:14:53.189121+07	3	Iphone xs max - ROM:256 - RAM:4 - Bạc, Xám, Vàng	2	[{"changed": {"fields": ["phoneColor"]}}]	12	2
111	2019-01-20 02:15:01.76041+07	2	Iphone 8 - ROM:256 - RAM:2 - Bạc, Xám, Vàng	2	[{"changed": {"fields": ["phoneColor"]}}]	12	2
112	2019-01-20 02:15:09.124032+07	1	Iphone X - ROM:256 - RAM:3 - Bạc, Xám, Vàng	2	[{"changed": {"fields": ["phoneColor"]}}]	12	2
113	2019-01-21 21:02:21.627662+07	2	Iphone xs max - CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh - received_time: 31-01-2019	1	[{"added": {}}]	18	2
114	2019-01-21 21:03:33.03759+07	1	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR - Iphone xs max - duration: 21-01-2019 -> 31-01-2019 	1	[{"added": {}}]	19	2
115	2019-01-21 21:25:35.165814+07	2	Iphone xs max - CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh - Received time: 24-01-2019	2	[{"changed": {"fields": ["receivedTime"]}}]	18	2
116	2019-01-21 21:31:05.221686+07	2	Iphone xs max - CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh - Received time: 31-01-2019	2	[{"changed": {"fields": ["receivedTime"]}}]	18	2
117	2019-01-22 08:17:05.726337+07	1	Iphone X - ROM:64 - RAM:3 - Bạc, Xám, Vàng	2	[{"changed": {"fields": ["phonePrice", "phoneMemory"]}}]	12	2
118	2019-01-22 08:17:16.840068+07	1	Iphone X - ROM:64 - RAM:2 - Bạc, Xám, Vàng	2	[{"changed": {"fields": ["phoneRAM"]}}]	12	2
119	2019-01-22 08:42:38.854144+07	2	Iphone xs max - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - Received time: 31-01-2019	2	[{"changed": {"fields": ["storeId"]}}]	18	2
\.


--
-- Data for Name: django_content_type; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_content_type (id, app_label, model) FROM stdin;
1	admin	logentry
2	auth	permission
3	auth	group
4	auth	user
5	contenttypes	contenttype
6	sessions	session
7	database	amountphonebystore
8	database	city
9	database	district
10	database	installment
11	database	ostype
12	database	phone
13	database	producer
14	database	province
15	database	saleoff
16	database	store
17	database	warranty
18	database	receivedtime
19	database	resell
\.


--
-- Data for Name: django_migrations; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_migrations (id, app, name, applied) FROM stdin;
1	contenttypes	0001_initial	2018-12-11 17:07:21.314612+07
2	auth	0001_initial	2018-12-11 17:07:21.39888+07
3	admin	0001_initial	2018-12-11 17:07:21.427737+07
4	admin	0002_logentry_remove_auto_add	2018-12-11 17:07:21.43533+07
5	admin	0003_logentry_add_action_flag_choices	2018-12-11 17:07:21.445005+07
6	contenttypes	0002_remove_content_type_name	2018-12-11 17:07:21.470698+07
7	auth	0002_alter_permission_name_max_length	2018-12-11 17:07:21.479306+07
8	auth	0003_alter_user_email_max_length	2018-12-11 17:07:21.488187+07
9	auth	0004_alter_user_username_opts	2018-12-11 17:07:21.500456+07
10	auth	0005_alter_user_last_login_null	2018-12-11 17:07:21.516919+07
11	auth	0006_require_contenttypes_0002	2018-12-11 17:07:21.519442+07
12	auth	0007_alter_validators_add_error_messages	2018-12-11 17:07:21.530976+07
13	auth	0008_alter_user_username_max_length	2018-12-11 17:07:21.544593+07
14	auth	0009_alter_user_last_name_max_length	2018-12-11 17:07:21.554485+07
15	database	0001_initial	2018-12-11 17:07:21.699903+07
16	sessions	0001_initial	2018-12-11 17:07:21.711363+07
17	database	0002_phone_phoneram	2018-12-11 17:24:32.644898+07
18	database	0003_auto_20181211_1102	2018-12-11 18:02:11.244614+07
19	database	0004_auto_20190119_1836	2019-01-20 01:36:34.318752+07
20	database	0005_receivedtime_resell	2019-01-21 21:01:09.267962+07
\.


--
-- Data for Name: django_session; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_session (session_key, session_data, expire_date) FROM stdin;
ivu4ktrbnmfgnbb0ynmle7d2lpr5cnx7	Zjc2MGYxMzQ1ZDcyZjdhYjg3MzYzOTQ3NzI3ZGYzNjhjMTRmZTJhYjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyYWQ4NDRlNzBjYWNjOTFhNjU1MmE1YjNlYzE5MmY3MWYxZmEzY2UyIn0=	2018-12-25 17:08:48.760866+07
wynzh759jreywd2gp8mp48k50j0iggi2	Zjc2MGYxMzQ1ZDcyZjdhYjg3MzYzOTQ3NzI3ZGYzNjhjMTRmZTJhYjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyYWQ4NDRlNzBjYWNjOTFhNjU1MmE1YjNlYzE5MmY3MWYxZmEzY2UyIn0=	2018-12-25 17:11:47.031791+07
lwar9edswpdhgumh9mk7t62orxlxea7t	Zjc2MGYxMzQ1ZDcyZjdhYjg3MzYzOTQ3NzI3ZGYzNjhjMTRmZTJhYjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyYWQ4NDRlNzBjYWNjOTFhNjU1MmE1YjNlYzE5MmY3MWYxZmEzY2UyIn0=	2018-12-25 17:26:58.956768+07
jwc8ijpwrruz9fofchzyrsglxyj8oa01	Zjc2MGYxMzQ1ZDcyZjdhYjg3MzYzOTQ3NzI3ZGYzNjhjMTRmZTJhYjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyYWQ4NDRlNzBjYWNjOTFhNjU1MmE1YjNlYzE5MmY3MWYxZmEzY2UyIn0=	2018-12-25 17:27:44.813278+07
4w0pcjejud7s35btla6jhupyeqvk7hnj	Zjc2MGYxMzQ1ZDcyZjdhYjg3MzYzOTQ3NzI3ZGYzNjhjMTRmZTJhYjp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyYWQ4NDRlNzBjYWNjOTFhNjU1MmE1YjNlYzE5MmY3MWYxZmEzY2UyIn0=	2018-12-25 17:29:02.636623+07
mlsynl0p2c2nydtm7itkhxolshomxzj1	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2018-12-25 17:32:41.690258+07
6l2arbxc809wqwad9wccftt8rar6znu8	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2018-12-25 17:32:52.262219+07
tj1duj9vj89bf294cuih7c1028u2ipqt	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2018-12-25 17:56:45.723293+07
wbgfdu0cp2oqtnokhta1ahl1an63iqz7	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2018-12-29 00:33:13.897531+07
7mw5txcmhbgn5ar5v5a95cnntc0enb0i	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2019-02-03 01:21:14.588771+07
udpg9sk0vaih6ehc9ad4coz8pgtl1evl	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2019-02-03 02:12:44.447857+07
fzsb14ws4fpep3q2zelg3xluifoifdwt	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2019-02-04 20:52:30.120512+07
hd0zq78h6pximolt8k8nwwhszjoewvoo	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2019-02-05 08:16:05.896874+07
lrj953qrownj6sxgw9oul2m1hrj8eoz0	MzU0MjQyMjVjZTQzNTlmMTBmNWIxYjM4NGFmZjU1Mjk2NmQ4NDlmYTp7Il9hdXRoX3VzZXJfaWQiOiIyIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI1NDMxNGQ1ZDIyNjU0NTNiNDhkNDVhNDJiMDBmNzE2ZDE0YmY0ZGZlIn0=	2019-02-05 08:38:29.748908+07
\.


--
-- Name: AmountPhoneByStore_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."AmountPhoneByStore_id_seq"', 3, true);


--
-- Name: City_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."City_id_seq"', 2, true);


--
-- Name: District_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."District_id_seq"', 28, true);


--
-- Name: Installment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Installment_id_seq"', 1, true);


--
-- Name: OsType_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."OsType_id_seq"', 8, true);


--
-- Name: Phone_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Phone_id_seq"', 3, true);


--
-- Name: Producer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Producer_id_seq"', 4, true);


--
-- Name: Province_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Province_id_seq"', 4, true);


--
-- Name: ReceivedTime_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."ReceivedTime_id_seq"', 2, true);


--
-- Name: Resell_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Resell_id_seq"', 1, true);


--
-- Name: SaleOff_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."SaleOff_id_seq"', 1, true);


--
-- Name: Store_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Store_id_seq"', 32, true);


--
-- Name: Warranty_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Warranty_id_seq"', 1, true);


--
-- Name: auth_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_group_id_seq', 1, false);


--
-- Name: auth_group_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_group_permissions_id_seq', 1, false);


--
-- Name: auth_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_permission_id_seq', 76, true);


--
-- Name: auth_user_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_user_groups_id_seq', 1, false);


--
-- Name: auth_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_user_id_seq', 2, true);


--
-- Name: auth_user_user_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_user_user_permissions_id_seq', 1, false);


--
-- Name: django_admin_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_admin_log_id_seq', 119, true);


--
-- Name: django_content_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_content_type_id_seq', 19, true);


--
-- Name: django_migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_migrations_id_seq', 20, true);


--
-- Name: AmountPhoneByStore AmountPhoneByStore_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."AmountPhoneByStore"
    ADD CONSTRAINT "AmountPhoneByStore_pkey" PRIMARY KEY (id);


--
-- Name: AmountPhoneByStore AmountPhoneByStore_storeId_phoneId_6af0a348_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."AmountPhoneByStore"
    ADD CONSTRAINT "AmountPhoneByStore_storeId_phoneId_6af0a348_uniq" UNIQUE ("storeId", "phoneId");


--
-- Name: City City_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."City"
    ADD CONSTRAINT "City_pkey" PRIMARY KEY (id);


--
-- Name: District District_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."District"
    ADD CONSTRAINT "District_pkey" PRIMARY KEY (id);


--
-- Name: Installment Installment_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment"
    ADD CONSTRAINT "Installment_pkey" PRIMARY KEY (id);


--
-- Name: OsType OsType_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."OsType"
    ADD CONSTRAINT "OsType_pkey" PRIMARY KEY (id);


--
-- Name: Phone Phone_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone"
    ADD CONSTRAINT "Phone_pkey" PRIMARY KEY (id);


--
-- Name: Producer Producer_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Producer"
    ADD CONSTRAINT "Producer_pkey" PRIMARY KEY (id);


--
-- Name: Province Province_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Province"
    ADD CONSTRAINT "Province_pkey" PRIMARY KEY (id);


--
-- Name: ReceivedTime ReceivedTime_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."ReceivedTime"
    ADD CONSTRAINT "ReceivedTime_pkey" PRIMARY KEY (id);


--
-- Name: Resell Resell_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Resell"
    ADD CONSTRAINT "Resell_pkey" PRIMARY KEY (id);


--
-- Name: SaleOff SaleOff_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff"
    ADD CONSTRAINT "SaleOff_pkey" PRIMARY KEY (id);


--
-- Name: Store Store_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store"
    ADD CONSTRAINT "Store_pkey" PRIMARY KEY (id);


--
-- Name: Warranty Warranty_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Warranty"
    ADD CONSTRAINT "Warranty_pkey" PRIMARY KEY (id);


--
-- Name: auth_group auth_group_name_key; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group
    ADD CONSTRAINT auth_group_name_key UNIQUE (name);


--
-- Name: auth_group_permissions auth_group_permissions_group_id_permission_id_0cd325b0_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_group_id_permission_id_0cd325b0_uniq UNIQUE (group_id, permission_id);


--
-- Name: auth_group_permissions auth_group_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_pkey PRIMARY KEY (id);


--
-- Name: auth_group auth_group_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group
    ADD CONSTRAINT auth_group_pkey PRIMARY KEY (id);


--
-- Name: auth_permission auth_permission_content_type_id_codename_01ab375a_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_content_type_id_codename_01ab375a_uniq UNIQUE (content_type_id, codename);


--
-- Name: auth_permission auth_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_pkey PRIMARY KEY (id);


--
-- Name: auth_user_groups auth_user_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_pkey PRIMARY KEY (id);


--
-- Name: auth_user_groups auth_user_groups_user_id_group_id_94350c0c_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_user_id_group_id_94350c0c_uniq UNIQUE (user_id, group_id);


--
-- Name: auth_user auth_user_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user
    ADD CONSTRAINT auth_user_pkey PRIMARY KEY (id);


--
-- Name: auth_user_user_permissions auth_user_user_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_pkey PRIMARY KEY (id);


--
-- Name: auth_user_user_permissions auth_user_user_permissions_user_id_permission_id_14a6b632_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_user_id_permission_id_14a6b632_uniq UNIQUE (user_id, permission_id);


--
-- Name: auth_user auth_user_username_key; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user
    ADD CONSTRAINT auth_user_username_key UNIQUE (username);


--
-- Name: django_admin_log django_admin_log_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_pkey PRIMARY KEY (id);


--
-- Name: django_content_type django_content_type_app_label_model_76bd3d3b_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_content_type
    ADD CONSTRAINT django_content_type_app_label_model_76bd3d3b_uniq UNIQUE (app_label, model);


--
-- Name: django_content_type django_content_type_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_content_type
    ADD CONSTRAINT django_content_type_pkey PRIMARY KEY (id);


--
-- Name: django_migrations django_migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_migrations
    ADD CONSTRAINT django_migrations_pkey PRIMARY KEY (id);


--
-- Name: django_session django_session_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_session
    ADD CONSTRAINT django_session_pkey PRIMARY KEY (session_key);


--
-- Name: AmountPhoneByStore_phoneId_476b5490; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "AmountPhoneByStore_phoneId_476b5490" ON public."AmountPhoneByStore" USING btree ("phoneId");


--
-- Name: AmountPhoneByStore_storeId_0c93b74c; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "AmountPhoneByStore_storeId_0c93b74c" ON public."AmountPhoneByStore" USING btree ("storeId");


--
-- Name: Phone_phoneInstallmentId_7e89405f; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Phone_phoneInstallmentId_7e89405f" ON public."Phone" USING btree ("phoneInstallmentId");


--
-- Name: Phone_phoneOsTypeId_52f2568f; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Phone_phoneOsTypeId_52f2568f" ON public."Phone" USING btree ("phoneOsTypeId");


--
-- Name: Phone_phoneProducerId_fc75d718; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Phone_phoneProducerId_fc75d718" ON public."Phone" USING btree ("phoneProducerId");


--
-- Name: Phone_phoneWarrantyId_2229f905; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Phone_phoneWarrantyId_2229f905" ON public."Phone" USING btree ("phoneWarrantyId");


--
-- Name: ReceivedTime_phoneId_aa9e9665; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "ReceivedTime_phoneId_aa9e9665" ON public."ReceivedTime" USING btree ("phoneId");


--
-- Name: ReceivedTime_storeId_412fff3a; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "ReceivedTime_storeId_412fff3a" ON public."ReceivedTime" USING btree ("storeId");


--
-- Name: Resell_phoneId_3ccdf561; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Resell_phoneId_3ccdf561" ON public."Resell" USING btree ("phoneId");


--
-- Name: SaleOff_saleOffPhoneId_87b94d70; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "SaleOff_saleOffPhoneId_87b94d70" ON public."SaleOff" USING btree ("saleOffPhoneId");


--
-- Name: Store_storeCityId_a11fd70f; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Store_storeCityId_a11fd70f" ON public."Store" USING btree ("storeCityId");


--
-- Name: Store_storeDistrictId_dd79af15; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Store_storeDistrictId_dd79af15" ON public."Store" USING btree ("storeDistrictId");


--
-- Name: Store_storeProvinceId_0fbdbf1e; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Store_storeProvinceId_0fbdbf1e" ON public."Store" USING btree ("storeProvinceId");


--
-- Name: auth_group_name_a6ea08ec_like; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_group_name_a6ea08ec_like ON public.auth_group USING btree (name varchar_pattern_ops);


--
-- Name: auth_group_permissions_group_id_b120cbf9; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_group_permissions_group_id_b120cbf9 ON public.auth_group_permissions USING btree (group_id);


--
-- Name: auth_group_permissions_permission_id_84c5c92e; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_group_permissions_permission_id_84c5c92e ON public.auth_group_permissions USING btree (permission_id);


--
-- Name: auth_permission_content_type_id_2f476e4b; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_permission_content_type_id_2f476e4b ON public.auth_permission USING btree (content_type_id);


--
-- Name: auth_user_groups_group_id_97559544; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_user_groups_group_id_97559544 ON public.auth_user_groups USING btree (group_id);


--
-- Name: auth_user_groups_user_id_6a12ed8b; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_user_groups_user_id_6a12ed8b ON public.auth_user_groups USING btree (user_id);


--
-- Name: auth_user_user_permissions_permission_id_1fbb5f2c; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_user_user_permissions_permission_id_1fbb5f2c ON public.auth_user_user_permissions USING btree (permission_id);


--
-- Name: auth_user_user_permissions_user_id_a95ead1b; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_user_user_permissions_user_id_a95ead1b ON public.auth_user_user_permissions USING btree (user_id);


--
-- Name: auth_user_username_6821ab7c_like; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX auth_user_username_6821ab7c_like ON public.auth_user USING btree (username varchar_pattern_ops);


--
-- Name: django_admin_log_content_type_id_c4bce8eb; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX django_admin_log_content_type_id_c4bce8eb ON public.django_admin_log USING btree (content_type_id);


--
-- Name: django_admin_log_user_id_c564eba6; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX django_admin_log_user_id_c564eba6 ON public.django_admin_log USING btree (user_id);


--
-- Name: django_session_expire_date_a5c62663; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX django_session_expire_date_a5c62663 ON public.django_session USING btree (expire_date);


--
-- Name: django_session_session_key_c0390e0f_like; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX django_session_session_key_c0390e0f_like ON public.django_session USING btree (session_key varchar_pattern_ops);


--
-- Name: AmountPhoneByStore AmountPhoneByStore_phoneId_476b5490_fk_Phone_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."AmountPhoneByStore"
    ADD CONSTRAINT "AmountPhoneByStore_phoneId_476b5490_fk_Phone_id" FOREIGN KEY ("phoneId") REFERENCES public."Phone"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: AmountPhoneByStore AmountPhoneByStore_storeId_0c93b74c_fk_Store_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."AmountPhoneByStore"
    ADD CONSTRAINT "AmountPhoneByStore_storeId_0c93b74c_fk_Store_id" FOREIGN KEY ("storeId") REFERENCES public."Store"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Phone Phone_phoneInstallmentId_7e89405f_fk_Installment_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone"
    ADD CONSTRAINT "Phone_phoneInstallmentId_7e89405f_fk_Installment_id" FOREIGN KEY ("phoneInstallmentId") REFERENCES public."Installment"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Phone Phone_phoneOsTypeId_52f2568f_fk_OsType_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone"
    ADD CONSTRAINT "Phone_phoneOsTypeId_52f2568f_fk_OsType_id" FOREIGN KEY ("phoneOsTypeId") REFERENCES public."OsType"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Phone Phone_phoneProducerId_fc75d718_fk_Producer_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone"
    ADD CONSTRAINT "Phone_phoneProducerId_fc75d718_fk_Producer_id" FOREIGN KEY ("phoneProducerId") REFERENCES public."Producer"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Phone Phone_phoneWarrantyId_2229f905_fk_Warranty_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Phone"
    ADD CONSTRAINT "Phone_phoneWarrantyId_2229f905_fk_Warranty_id" FOREIGN KEY ("phoneWarrantyId") REFERENCES public."Warranty"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: ReceivedTime ReceivedTime_phoneId_aa9e9665_fk_Phone_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."ReceivedTime"
    ADD CONSTRAINT "ReceivedTime_phoneId_aa9e9665_fk_Phone_id" FOREIGN KEY ("phoneId") REFERENCES public."Phone"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: ReceivedTime ReceivedTime_storeId_412fff3a_fk_Store_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."ReceivedTime"
    ADD CONSTRAINT "ReceivedTime_storeId_412fff3a_fk_Store_id" FOREIGN KEY ("storeId") REFERENCES public."Store"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Resell Resell_phoneId_3ccdf561_fk_Phone_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Resell"
    ADD CONSTRAINT "Resell_phoneId_3ccdf561_fk_Phone_id" FOREIGN KEY ("phoneId") REFERENCES public."Phone"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: SaleOff SaleOff_saleOffPhoneId_87b94d70_fk_Phone_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff"
    ADD CONSTRAINT "SaleOff_saleOffPhoneId_87b94d70_fk_Phone_id" FOREIGN KEY ("saleOffPhoneId") REFERENCES public."Phone"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Store Store_storeCityId_a11fd70f_fk_City_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store"
    ADD CONSTRAINT "Store_storeCityId_a11fd70f_fk_City_id" FOREIGN KEY ("storeCityId") REFERENCES public."City"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Store Store_storeDistrictId_dd79af15_fk_District_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store"
    ADD CONSTRAINT "Store_storeDistrictId_dd79af15_fk_District_id" FOREIGN KEY ("storeDistrictId") REFERENCES public."District"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Store Store_storeProvinceId_0fbdbf1e_fk_Province_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store"
    ADD CONSTRAINT "Store_storeProvinceId_0fbdbf1e_fk_Province_id" FOREIGN KEY ("storeProvinceId") REFERENCES public."Province"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_group_permissions auth_group_permissio_permission_id_84c5c92e_fk_auth_perm; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissio_permission_id_84c5c92e_fk_auth_perm FOREIGN KEY (permission_id) REFERENCES public.auth_permission(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_group_permissions auth_group_permissions_group_id_b120cbf9_fk_auth_group_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_group_permissions
    ADD CONSTRAINT auth_group_permissions_group_id_b120cbf9_fk_auth_group_id FOREIGN KEY (group_id) REFERENCES public.auth_group(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_permission auth_permission_content_type_id_2f476e4b_fk_django_co; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_permission
    ADD CONSTRAINT auth_permission_content_type_id_2f476e4b_fk_django_co FOREIGN KEY (content_type_id) REFERENCES public.django_content_type(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_user_groups auth_user_groups_group_id_97559544_fk_auth_group_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_group_id_97559544_fk_auth_group_id FOREIGN KEY (group_id) REFERENCES public.auth_group(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_user_groups auth_user_groups_user_id_6a12ed8b_fk_auth_user_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_groups
    ADD CONSTRAINT auth_user_groups_user_id_6a12ed8b_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_user_user_permissions auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permi_permission_id_1fbb5f2c_fk_auth_perm FOREIGN KEY (permission_id) REFERENCES public.auth_permission(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: auth_user_user_permissions auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.auth_user_user_permissions
    ADD CONSTRAINT auth_user_user_permissions_user_id_a95ead1b_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: django_admin_log django_admin_log_content_type_id_c4bce8eb_fk_django_co; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_content_type_id_c4bce8eb_fk_django_co FOREIGN KEY (content_type_id) REFERENCES public.django_content_type(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: django_admin_log django_admin_log_user_id_c564eba6_fk_auth_user_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public.django_admin_log
    ADD CONSTRAINT django_admin_log_user_id_c564eba6_fk_auth_user_id FOREIGN KEY (user_id) REFERENCES public.auth_user(id) DEFERRABLE INITIALLY DEFERRED;


--
-- PostgreSQL database dump complete
--

