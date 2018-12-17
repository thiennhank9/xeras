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
-- Name: Category; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Category" (
    id integer NOT NULL,
    "categoryName" text NOT NULL
);


ALTER TABLE public."Category" OWNER TO xeras;

--
-- Name: Category_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Category_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Category_id_seq" OWNER TO xeras;

--
-- Name: Category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Category_id_seq" OWNED BY public."Category".id;


--
-- Name: Guarantee; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Guarantee" (
    id integer NOT NULL,
    note text NOT NULL,
    duration integer NOT NULL,
    "guaranteeName" text NOT NULL
);


ALTER TABLE public."Guarantee" OWNER TO xeras;

--
-- Name: Guarantee_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Guarantee_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Guarantee_id_seq" OWNER TO xeras;

--
-- Name: Guarantee_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Guarantee_id_seq" OWNED BY public."Guarantee".id;


--
-- Name: Guarantee_productId; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Guarantee_productId" (
    id integer NOT NULL,
    guarantee_id integer NOT NULL,
    product_id integer NOT NULL
);


ALTER TABLE public."Guarantee_productId" OWNER TO xeras;

--
-- Name: Guarantee_productId_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Guarantee_productId_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Guarantee_productId_id_seq" OWNER TO xeras;

--
-- Name: Guarantee_productId_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Guarantee_productId_id_seq" OWNED BY public."Guarantee_productId".id;


--
-- Name: Installment; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Installment" (
    id integer NOT NULL,
    "companyName" text NOT NULL,
    credit text NOT NULL,
    note text NOT NULL,
    "requiredInformation" text NOT NULL
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
-- Name: Installment_productId; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Installment_productId" (
    id integer NOT NULL,
    installment_id integer NOT NULL,
    product_id integer NOT NULL
);


ALTER TABLE public."Installment_productId" OWNER TO xeras;

--
-- Name: Installment_productId_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Installment_productId_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Installment_productId_id_seq" OWNER TO xeras;

--
-- Name: Installment_productId_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Installment_productId_id_seq" OWNED BY public."Installment_productId".id;


--
-- Name: LanguageSupport; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."LanguageSupport" (
    id integer NOT NULL,
    "languageName" text NOT NULL
);


ALTER TABLE public."LanguageSupport" OWNER TO xeras;

--
-- Name: LanguageSupport_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."LanguageSupport_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."LanguageSupport_id_seq" OWNER TO xeras;

--
-- Name: LanguageSupport_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."LanguageSupport_id_seq" OWNED BY public."LanguageSupport".id;


--
-- Name: Manufacturer; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Manufacturer" (
    id integer NOT NULL,
    "manufacturerName" text NOT NULL,
    address1 text NOT NULL,
    address2 text NOT NULL,
    "City" text NOT NULL,
    district text NOT NULL,
    street text NOT NULL
);


ALTER TABLE public."Manufacturer" OWNER TO xeras;

--
-- Name: Manufacturer_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Manufacturer_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Manufacturer_id_seq" OWNER TO xeras;

--
-- Name: Manufacturer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Manufacturer_id_seq" OWNED BY public."Manufacturer".id;


--
-- Name: PhoneCode; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."PhoneCode" (
    id integer NOT NULL,
    code text NOT NULL
);


ALTER TABLE public."PhoneCode" OWNER TO xeras;

--
-- Name: PhoneCode_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."PhoneCode_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PhoneCode_id_seq" OWNER TO xeras;

--
-- Name: PhoneCode_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."PhoneCode_id_seq" OWNED BY public."PhoneCode".id;


--
-- Name: PhoneFeature; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."PhoneFeature" (
    id integer NOT NULL,
    game text NOT NULL,
    music text NOT NULL,
    photo text NOT NULL,
    video text NOT NULL,
    "videoCall" text NOT NULL,
    "featureTimeUsing" text NOT NULL,
    "phoneCategoryType" text NOT NULL
);


ALTER TABLE public."PhoneFeature" OWNER TO xeras;

--
-- Name: PhoneFeature_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."PhoneFeature_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PhoneFeature_id_seq" OWNER TO xeras;

--
-- Name: PhoneFeature_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."PhoneFeature_id_seq" OWNED BY public."PhoneFeature".id;


--
-- Name: PhoneInfo; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."PhoneInfo" (
    id integer NOT NULL,
    "phone3G" text NOT NULL,
    "phone4G" text NOT NULL,
    "dateStartSell" date,
    width double precision,
    height double precision,
    thickness double precision,
    inch double precision NOT NULL,
    weight double precision,
    resolution text NOT NULL,
    "screenType" text NOT NULL,
    "simType" text NOT NULL,
    "simNumber" integer NOT NULL,
    "osType" text NOT NULL,
    "osVersion" text NOT NULL,
    chipset text NOT NULL,
    version text NOT NULL,
    "GPU" text NOT NULL,
    "RAM" integer NOT NULL,
    "ROM" integer NOT NULL,
    "fromCountry" text NOT NULL,
    "fromType" text NOT NULL,
    status text NOT NULL,
    "phoneInfoType" text NOT NULL,
    "cameraBack" double precision NOT NULL,
    "cameraFront" double precision NOT NULL,
    video text NOT NULL,
    "WLAN" text NOT NULL,
    bluetooth text NOT NULL,
    "GPS" text NOT NULL,
    "NFC" text NOT NULL,
    "Pin" text NOT NULL,
    color text NOT NULL,
    price1 double precision NOT NULL,
    price2 double precision NOT NULL,
    "phoneCode" integer NOT NULL,
    "phoneFeature" integer NOT NULL,
    "phoneProductId" integer NOT NULL,
    "chargerTime" double precision NOT NULL,
    "chargerType" text NOT NULL,
    "memoryCardSlot" text NOT NULL,
    "phoneTimeUsing" text NOT NULL,
    "phoneCase" text NOT NULL,
    other text NOT NULL
);


ALTER TABLE public."PhoneInfo" OWNER TO xeras;

--
-- Name: PhoneInfo_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."PhoneInfo_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PhoneInfo_id_seq" OWNER TO xeras;

--
-- Name: PhoneInfo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."PhoneInfo_id_seq" OWNED BY public."PhoneInfo".id;


--
-- Name: PhoneInfo_phoneLanguage; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."PhoneInfo_phoneLanguage" (
    id integer NOT NULL,
    phoneinfo_id integer NOT NULL,
    languagesupport_id integer NOT NULL
);


ALTER TABLE public."PhoneInfo_phoneLanguage" OWNER TO xeras;

--
-- Name: PhoneInfo_phoneLanguage_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."PhoneInfo_phoneLanguage_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."PhoneInfo_phoneLanguage_id_seq" OWNER TO xeras;

--
-- Name: PhoneInfo_phoneLanguage_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."PhoneInfo_phoneLanguage_id_seq" OWNED BY public."PhoneInfo_phoneLanguage".id;


--
-- Name: Post; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Post" (
    id integer NOT NULL,
    "postTitle" text NOT NULL,
    "postContent" text NOT NULL,
    "postLink" text NOT NULL
);


ALTER TABLE public."Post" OWNER TO xeras;

--
-- Name: Post_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Post_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Post_id_seq" OWNER TO xeras;

--
-- Name: Post_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Post_id_seq" OWNED BY public."Post".id;


--
-- Name: Product; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Product" (
    id integer NOT NULL,
    "productName" text NOT NULL,
    "productOtherNames" text NOT NULL,
    "productCategoryId" integer NOT NULL,
    "productManufacturerId" integer NOT NULL,
    "productPostId" integer NOT NULL
);


ALTER TABLE public."Product" OWNER TO xeras;

--
-- Name: Product_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Product_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Product_id_seq" OWNER TO xeras;

--
-- Name: Product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Product_id_seq" OWNED BY public."Product".id;


--
-- Name: SaleOff; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."SaleOff" (
    id integer NOT NULL,
    "saleOffPrice" double precision NOT NULL,
    "dateStart" date NOT NULL,
    "dateEnd" date NOT NULL,
    other text NOT NULL,
    "productId" integer NOT NULL,
    "saleOffName" text NOT NULL
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
-- Name: StoreInventory; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."StoreInventory" (
    id integer NOT NULL,
    amount integer NOT NULL,
    "productId" integer NOT NULL,
    "storeId" integer NOT NULL
);


ALTER TABLE public."StoreInventory" OWNER TO xeras;

--
-- Name: StoreInventory_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."StoreInventory_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."StoreInventory_id_seq" OWNER TO xeras;

--
-- Name: StoreInventory_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."StoreInventory_id_seq" OWNED BY public."StoreInventory".id;


--
-- Name: Store_CT; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Store_CT" (
    id integer NOT NULL,
    "storeName" text NOT NULL,
    address1 text NOT NULL,
    address2 text NOT NULL,
    "City" text NOT NULL,
    district text NOT NULL,
    street text NOT NULL,
    province text NOT NULL,
    "storePayment" text NOT NULL
);


ALTER TABLE public."Store_CT" OWNER TO xeras;

--
-- Name: Store_CT_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."Store_CT_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Store_CT_id_seq" OWNER TO xeras;

--
-- Name: Store_CT_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."Store_CT_id_seq" OWNED BY public."Store_CT".id;


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
-- Name: Category id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Category" ALTER COLUMN id SET DEFAULT nextval('public."Category_id_seq"'::regclass);


--
-- Name: Guarantee id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee" ALTER COLUMN id SET DEFAULT nextval('public."Guarantee_id_seq"'::regclass);


--
-- Name: Guarantee_productId id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee_productId" ALTER COLUMN id SET DEFAULT nextval('public."Guarantee_productId_id_seq"'::regclass);


--
-- Name: Installment id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment" ALTER COLUMN id SET DEFAULT nextval('public."Installment_id_seq"'::regclass);


--
-- Name: Installment_productId id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment_productId" ALTER COLUMN id SET DEFAULT nextval('public."Installment_productId_id_seq"'::regclass);


--
-- Name: LanguageSupport id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."LanguageSupport" ALTER COLUMN id SET DEFAULT nextval('public."LanguageSupport_id_seq"'::regclass);


--
-- Name: Manufacturer id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Manufacturer" ALTER COLUMN id SET DEFAULT nextval('public."Manufacturer_id_seq"'::regclass);


--
-- Name: PhoneCode id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneCode" ALTER COLUMN id SET DEFAULT nextval('public."PhoneCode_id_seq"'::regclass);


--
-- Name: PhoneFeature id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneFeature" ALTER COLUMN id SET DEFAULT nextval('public."PhoneFeature_id_seq"'::regclass);


--
-- Name: PhoneInfo id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo" ALTER COLUMN id SET DEFAULT nextval('public."PhoneInfo_id_seq"'::regclass);


--
-- Name: PhoneInfo_phoneLanguage id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo_phoneLanguage" ALTER COLUMN id SET DEFAULT nextval('public."PhoneInfo_phoneLanguage_id_seq"'::regclass);


--
-- Name: Post id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Post" ALTER COLUMN id SET DEFAULT nextval('public."Post_id_seq"'::regclass);


--
-- Name: Product id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Product" ALTER COLUMN id SET DEFAULT nextval('public."Product_id_seq"'::regclass);


--
-- Name: SaleOff id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff" ALTER COLUMN id SET DEFAULT nextval('public."SaleOff_id_seq"'::regclass);


--
-- Name: StoreInventory id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."StoreInventory" ALTER COLUMN id SET DEFAULT nextval('public."StoreInventory_id_seq"'::regclass);


--
-- Name: Store_CT id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store_CT" ALTER COLUMN id SET DEFAULT nextval('public."Store_CT_id_seq"'::regclass);


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
-- Data for Name: Category; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Category" (id, "categoryName") FROM stdin;
1   Iphone
2	SamSung Galaxy
4	Xiaomi Mi
5	Xiaomi Redmi
6	oppo
7	Asus
8	Huewei
\.


--
-- Data for Name: Guarantee; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Guarantee" (id, note, duration, "guaranteeName") FROM stdin;
1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Iphone XS Max
2	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy Note 9
3	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Iphone X
4	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Iphone 8 plus
5	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Iphone 8
6	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Iphone 7 (Certified Pre-Owned)
7	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy A9
8	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy A7
9	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy J6 Plus
10	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy S8+
11	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Samsung Galaxy S9+
12	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Redmi S2
13	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Xiaomi Mi 8 Lite
14	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại Xiaomi Mi 8
16	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài	1	Bảo hành điện thoại ASUS ZenFone Max Pro M1
\.


--
-- Data for Name: Guarantee_productId; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Guarantee_productId" (id, guarantee_id, product_id) FROM stdin;
1	1	1
2	2	2
3	3	3
4	4	4
5	5	5
6	6	6
7	7	8
8	8	9
9	9	10
10	10	11
11	11	12
12	12	14
13	13	15
14	14	16
16	16	17
17	16	18
18	16	19
19	16	20
\.


--
-- Data for Name: Installment; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Installment" (id, "companyName", credit, note, "requiredInformation") FROM stdin;
1	FE CREDIT	Tiền mặt	chi tiết tại https://fecredit.com.vn/	trên 18 tuổi; có bảng lương hoặc cà vẹt xe hoặc hợp đồng bảo hiểm
\.


--
-- Data for Name: Installment_productId; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Installment_productId" (id, installment_id, product_id) FROM stdin;
1	1	1
2	1	2
3	1	3
4	1	4
5	1	5
6	1	6
7	1	7
8	1	8
9	1	9
20	1	10
21	1	11
22	1	12
23	1	13
24	1	14
25	1	15
26	1	16
27	1	17
28	1	18
29	1	19
30	1	20
\.


--
-- Data for Name: LanguageSupport; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."LanguageSupport" (id, "languageName") FROM stdin;
1	Tiếng Việt
2	Tiếng Anh
3	Tiếng Hàn
4	Tiếng Trung Quốc
\.


--
-- Data for Name: Manufacturer; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Manufacturer" (id, "manufacturerName", address1, address2, "City", district, street) FROM stdin;
1	Apple	Cupertino, CA 95014	Cupertino, CA 95014	california	Cupertino	Cupertino
2	SamSung	Giheung, South Korea, Hwaseong, South Korea	Pyeongtaek, South Korea	Giheung	Giheung-gu	Samsung-ro
3	Xiaomi	Xiaomi manufactory address	Xiaomi manufactory address	Xiaomi manufactory address	China	China
4	ASUS	ASUS manufacturer address	ASUS manufacturer address	ASUS manufacturer address	China	China
\.


--
-- Data for Name: PhoneCode; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneCode" (id, code) FROM stdin;
1	VN/A
2	VN/SS
3	VN/SSJ
4	VN/SS+
5	VN/XIAOMIR
6	VN/XIAOMIM
\.


--
-- Data for Name: PhoneFeature; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneFeature" (id, game, music, photo, video, "videoCall", "featureTimeUsing", "phoneCategoryType") FROM stdin;
1	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone X / Iphone XS Max
7	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 8 / Iphone 8 Plus
8	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 7 / Iphone 7 Plus
9	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 6 / Iphone 6 Plus
10	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy A9 | A7
11	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy J6 Plus | J6
12	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy S8+ | S8 | S9+ | S9
14	Liên quân,tạm ổn; alpha 8,tạm ổn	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	ASUS ZenFone M1
13	Liên quân,trung bình; alpha 8,hơi giật	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh sặc sỡ, camera kép	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 2 tiếng;nghe nhạc, 2 tiếng	Redmi S2 | Mi 8
6	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	SamSung Galaxy Note 9
\.


--
-- Data for Name: PhoneInfo; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneInfo" (id, "phone3G", "phone4G", "dateStartSell", width, height, thickness, inch, weight, resolution, "screenType", "simType", "simNumber", "osType", "osVersion", chipset, version, "GPU", "RAM", "ROM", "fromCountry", "fromType", status, "phoneInfoType", "cameraBack", "cameraFront", video, "WLAN", bluetooth, "GPS", "NFC", "Pin", color, price1, price2, "phoneCode", "phoneFeature", "phoneProductId", "chargerTime", "chargerType", "memoryCardSlot", "phoneTimeUsing", "phoneCase", other) FROM stdin;
6	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	6.5	208	1242 x 2688 pixel	Super Retina OLED	Nano-SIM	1	IOS	12	Apple A12 Bionic 6 nhân	Phiên bản Quốc tế	Apple GPU 4 nhân	4	64	California	Chính hãng	like new	SmartPhone	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	vàng	32.7999999999999972	32.7999999999999972	1	1	1	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
9	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	6.40000000000000036	201	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	Quốc Tế	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	6	128	Korea	Chính hãng	Mới 100%	SmartPhone	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Xanh Dương	22.8999999999999986	22.8999999999999986	2	6	2	1.5	sạc 2 chấu	1	6-8 tiếng	Vỏ kim loại	Chống nước
10	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	6.40000000000000036	201	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	Quốc Tế	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	6	128	Korea	Chính hãng	Mới 100%	SmartPhone	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Đen	22.8999999999999986	22.8999999999999986	2	6	2	1.5	sạc 2 chấu	1	6-8 tiếng	Vỏ kim loại	Chống nước
7	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	6.5	208	1242 x 2688 pixel	Super Retina OLED	Nano-SIM	1	IOS	12	Apple A12 Bionic 6 nhân	Quốc tế	Apple GPU 4 nhân	4	64	California	Chính hãng	Mới 100%	SmartPhone	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Xám, Xám bạc, Bạc	31.8000000000000007	31.8000000000000007	1	1	1	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
11	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	6.40000000000000036	201	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	Quốc Tế	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	6	128	Korea	Chính hãng	Mới 100%	SmartPhone	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Đồng	22.8999999999999986	22.8999999999999986	2	6	2	1.5	sạc 2 chấu	1	6-8 tiếng	Vỏ kim loại	Chống nước
5	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	6.5	208	1242 x 2688 pixel	Super Retina OLED	Nano-SIM	1	IOS	12	Apple A12 Bionic 6 nhân	Quốc tế	Apple GPU 4 nhân	4	512	California	Chính hãng	like new	SmartPhone	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Vàng	35.5	35.5	1	1	1	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
12	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (3CA) Cat12 600/150 Mbps	2018-12-03	143.599999999999994	70.9000000000000057	7.70000000000000018	5.79999999999999982	174	1125 x 2436 pixels	Cảm ứng điện dung OLED, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A11 Bionic APL1W72	Quốc Tế	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	3	64	Mỹ	Nhập khẩu	Mới 100%	SmartPhone	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2716 mAh	Bạc, Xám	21.5	21.5	1	1	3	2	sạc 2 chấu	1	6-8 tiếng	Vỏ kim loại	Chống nước
13	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	5.5	202	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A11 Bionic APL1W72	Quốc Tế	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	3	64	Mỹ	Chính hãng	Mới 100%	SmartPhone	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Bạc, Xám	17.8999999999999986	17.8999999999999986	1	7	4	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
14	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	5.5	202	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A11 Bionic APL1W72	Quốc Tế	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	3	64	Mỹ	Chính hãng	Mới 100%	SmartPhone	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Vàng	18	18	1	7	4	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
15	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	5.5	202	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A11 Bionic APL1W72	Quốc Tế	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	3	64	Mỹ	Chính hãng	Mới 100%	SmartPhone	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Đỏ	18.1999999999999993	18.1999999999999993	1	7	4	2	sạc 2 chấu	1	6-8 tiếng	Vỏ nhôm	Chống nước
16	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (3CA) Cat9 450/50 Mbps	2018-12-03	158.199999999999989	77.9000000000000057	7.29999999999999982	4.70000000000000018	188	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A10 Fusion APL1W24	Certified Pre-Owned; Mở bán lại, đổi trả bảo hành	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	3	128	Mỹ	Chính hãng	Certified Pre-Owned; Mở bán lại, đổi trả bảo hành	SmartPhone	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2900 mAh	Vàng, Hồng	15	15	1	8	6	2	sạc 2 chấu	Không	6-8 tiếng	Vỏ nhôm	Chống nước
17	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	138.300000000000011	67.0999999999999943	7.09999999999999964	4.70000000000000018	143	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A9 APL0898	Hàng cũ	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	2	64	Mỹ	Chính hãng	Hàng cũ, 99%	SmartPhone	12	5	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 1715 mAh	Vàng	6	6	1	9	7	2	sạc 2 chấu	Không	6-8 tiếng	Vỏ nhôm	Chống nước
18	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	138.300000000000011	67.0999999999999943	7.09999999999999964	4.70000000000000018	143	1080 x 1920 pixels	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	Nano-SIM	1	iOS	11	Apple A9 APL0898	Hàng cũ	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	2	64	Mỹ	Chính hãng	Hàng cũ, 99%	SmartPhone	12	5	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 1715 mAh	Hồng, Xám	5.90000000000000036	5.90000000000000036	1	9	7	2	sạc 2 chấu	Không	6-8 tiếng	Vỏ nhôm	Chống nước
20	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	\N	\N	\N	6.28000000000000025	\N	1080 x 2280 pixels	Super AMOLED cảm ứng điện dung, 16 triệu màu	Nano-SIM	2	Android	Android 8.0	Qualcomm SDM660 Snapdragon 660	Hàng mới	8 nhân (4 x 2.2 GHz Kryo 260 & 4 x 1.8 GHz Kryo 260)	26	128	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	4	24	1080p@30fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	Bluetooth 5.0	A-GPS, GLONASS, BDS, GALILEO	Yes	3720 mAh	Hồng, Xanh dương, Đen	12.4000000000000004	12.4000000000000004	2	10	8	1.5	sạc 2 chấu	microSD, hỗ trợ đến 256GB	4-6 tiếng	Vỏ kim loại	Chống nước
21	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	159.800000000000011	76.7999999999999972	7.5	6	168	1080 x 2220 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	Android 8.0 (Oreo)	Exynoss 7885	Hàng mới	8 nhân (2 x 2.2Ghz Cortex-A73, 6 x 1.6Ghz Cortex A53)	4	64	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	24	24	2160p@30fps, 1080p@30fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, WiFi Direct, hotspot	Bluetooth 5.0	A-GPS, GLONASS, BDS	Yes	3.300mAh	Vàng, Xanh dương, Đen	7.59999999999999964	7.59999999999999964	2	10	9	2	sạc 2 chấu	micro SD hỗ trợ đến 512GB	4-6 tiếng	Vỏ kim loại	Màn hình tràn viền
22	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	161.400000000000006	76.9000000000000057	7.90000000000000036	6	178	720 x 1480 pixels	Màn hình cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	Android 8.1 (Oreo)	Qualcomm Snapdragon 425 MSM8917	Hàng mới	4 nhân x 1.4GHz, Cortex-A53	3	32	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	13	8	Full HD 1080p@30fps	Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Hotspot	Bluetooth 4.2	A-GPS, GLONASS, BDS	Yes	3300mAh	Xám, Đen, Đỏ	4.59999999999999964	4.59999999999999964	3	11	10	2	sạc 2 chấu	micro SD hỗ trợ đến 512GB	4-6 tiếng	Vỏ nhựa	Màn hình tràn viền
23	HSPA 42.2/5.76 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	159.5	73.4000000000000057	8.09999999999999964	6.20000000000000018	173	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	7.0 (Nougat)	Samsung Exynos 9 Octa 8895	Hàng mới	4x 2.3 GHz Exynos M2 Mongoose & 4x 1.7 GHz ARM Cortex-A53	4	64	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	12	8	2160p@30fps, 1080p@60fps, 720p@240fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3500 mAh	Tím, Đen	12.6999999999999993	12.6999999999999993	4	12	11	1.5	sạc 2 chấu	microSD, lên đến 256 GB	8-10 tiếng	Vỏ kim loại	Màn hình vô cực
24	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	158.099999999999994	73.7999999999999972	8.5	6.20000000000000018	189	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	8.0 (Oreo)	Samsung Exynos 9 9810	Hàng mới	4x 2.9 GHz Exynos M3 Mongoose & 4x 1.9 GHz ARM Cortex-A55	6	64	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	12	8	2160p@60fps, 1080p@60fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3500 mAh	Tím, Xanh dương, Đen	18.8999999999999986	18.8999999999999986	4	12	12	1.5	sạc 2 chấu	microSD, lên đến 256 GB	8-10 tiếng	Vỏ kim loại	Màn hình vô cực
25	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	148.900000000000006	68.0999999999999943	8	5.79999999999999982	155	1440 x 2960 pixels	Cảm ứng điện dung Super AMOLED, 16 triệu màu	Nano-SIM	2	Android	7.0 (Nougat)	Samsung Exynos 9 Octa 8895	Hàng cũ, like new, 99%	4x 2.3 GHz Exynos M2 Mongoose & 4x 1.7 GHz ARM Cortex-A53	4	64	Hàn Quốc; Korea	Chính hãng	Hàng cũ, like new, 99%	SmartPhone	12	8	2160p@60fps, 1080p@60fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3000 mAh	Vàng	7	7	4	12	13	1.5	sạc 2 chấu	microSD, lên đến 256 GB	8-10 tiếng	Vỏ kim loại	Màn hình vô cực
26	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	160.699999999999989	77.2999999999999972	8.09999999999999964	6	170	720 x 1440 pixels	Cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	8.1 (Oreo)	Qualcomm MSM8953 Snapdragon 625	Hàng mới	8x 2.0 GHz Cortex-A53	4	64	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	12	16	1080p@30fps	Wi-Fi 802.11 b/g/n, WiFi Direct, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS	Yes	Li-Po 3080 mAh	Vàng, Xám	2.89999999999999991	2.89999999999999991	5	13	14	1.5	sạc 2 chấu	microSD, lên đến 256 GB	2-5 tếng	Vỏ nhựa	Tích hợp cảm biến vân tay cực nhạy
27	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	156.400000000000006	75.7999999999999972	7.5	6.25999999999999979	169	1080 x 2280 pixels	IPS LCD	Nano-SIM	2	Android	Android 8.1 (Oreo)	Qualcomm Snapdragon 660 8 nhân	Hàng mới	4 nhân 2.2 GHz & 4 nhân 1.8 GHz	4	64	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	12	24	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@120fps, Quay phim 4K 2160p@30fps	Wi-Fi 802.11 b/g/n, WiFi Direct, hotspot	A2DP, LE, v5.0	A-GPS, GLONASS	Yes	3350 mAh, Pin chuẩn Li-Ion	Đen	5.70000000000000018	5.70000000000000018	6	13	15	1.5	sạc 2 chấu	Không	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
28	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	154.900000000000006	74.7999999999999972	7.59999999999999964	6.20999999999999996	175	1080 x 2248 pixels	Cảm ứng điện dung AMOLED, 16 triệu màu	Nano-SIM	2	Android	Android 8.1 (Oreo)	4x 2.8 GHz Kryo 385 Gold & 4x 1.8 GHz Kryo 385 Silver	Hàng mới	Qualcomm SDM845 Snapdragon 845	6	64	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	12	20	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	5.0, A2DP, LE, aptX HD	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 3400 mAh	Trắng, Xanh dương, Đen	10.6999999999999993	10.6999999999999993	6	13	16	1.5	sạc 2 chấu	Không	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
29	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	6	180	1080 x 2160 pixels	Cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	Hàng mới	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	3	32	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Bạc, Đen	4.20000000000000018	4.20000000000000018	6	14	17	1.5	sạc 2 chấu	Không	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
30	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	6	180	1080 x 2160 pixels	Cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	Hàng mới	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	4	64	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Bạc, Đen	5.20000000000000018	5.20000000000000018	6	14	18	1.5	sạc 2 chấu	Không	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
31	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	6	180	1080 x 2160 pixels	Cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	Hàng mới	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	6	64	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Bạc, Đen	6.40000000000000036	6.40000000000000036	6	14	19	1.5	sạc 2 chấu	Không	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
32	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	5.70000000000000018	180	1080 x 2160 pixels	Cảm ứng điện dung IPS LCD, 16 triệu màu	Nano-SIM	2	Android	7.0 (Nougat)	Mediatek MT6750T	Hàng mới	4x 1.5 GHz ARM Cortex-A53 & 4x 1.0 GHz ARM Cortex-A53	3	32	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	16	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.0, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 4130 mAh	Xanh dương	3.20000000000000018	3.20000000000000018	6	14	20	1.5	sạc 2 chấu	microSD, lên đến 256 GB	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu
\.


--
-- Data for Name: PhoneInfo_phoneLanguage; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneInfo_phoneLanguage" (id, phoneinfo_id, languagesupport_id) FROM stdin;
1	5	1
2	6	1
4	7	2
5	9	1
6	9	2
7	9	3
8	10	1
9	10	2
10	10	3
11	11	1
12	11	2
13	11	3
14	12	1
15	12	2
16	12	3
17	13	1
18	13	2
19	13	3
20	14	1
21	14	2
22	14	3
23	15	1
24	15	2
25	15	3
26	16	1
27	16	2
28	16	3
29	17	1
30	17	2
31	17	3
32	18	1
33	18	2
34	18	3
35	20	1
36	20	2
37	20	3
38	21	1
39	21	2
40	21	3
41	22	1
42	22	2
43	22	3
44	23	1
45	23	2
46	23	3
47	24	1
48	24	2
49	24	3
50	25	1
51	25	2
52	25	3
53	26	1
54	26	2
55	26	3
56	27	1
57	27	2
58	27	3
59	27	4
60	28	1
61	28	2
62	28	3
63	28	4
64	29	1
65	29	2
66	29	3
67	29	4
68	30	1
69	30	2
70	30	3
71	30	4
72	31	1
73	31	2
74	31	3
75	31	4
76	32	1
77	32	2
78	32	3
79	32	4
\.


--
-- Data for Name: Post; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Post" (id, "postTitle", "postContent", "postLink") FROM stdin;
1	Apple iPhone XS Max 64GB Chính hãng (VN/A)	Apple iPhone XS Max 64GB Chính hãng\r\niPhone XS Max 64GB chính hãng là chiếc iPhone đặc biệt nhất từ trước đến nay với màn hình và dung lượng pin lớn nhất. Cùng với thiết kế sang trọng đã thành thương hiệu, hiệu năng “khủng” hơn nữa và camera được nâng cấp mạnh mẽ, đây chắc chắn là sự lựa chọn mà người dùng nên cân nhắc khi muốn mua một chiếc smartphone cao cấp.	https://cellphones.com.vn/apple-iphone-xs-max-64-gb-chinh-hang-vn.html
2	Samsung Galaxy Note 9 Chính hãng	Samsung Galaxy Note 9 Chính hãng\r\nGalaxy Note 9 là dòng smartphone cao cấp nhất của Samsung hiện nay. Nó sở hữu mọi điểm mạnh về thiết kế, màn hình, camera… trên dòng Galaxy S nhưng được bổ sung thêm cây bút S-Pen “thần thánh”. Chính vì vậy, Galaxy Note 9 Chính hãng phiên bản 2018 rất được người dùng quan tâm.	https://cellphones.com.vn/samsung-galaxy-note-9-chinh-hang.html
3	Apple iPhone X 64GB	Apple iPhone X 64GB (Nhập khẩu)\r\niPhone X đánh dấu cột mốc 10 năm ra đời. Chính vì vậy, chiếc smartphone này được Apple cải tiến toàn diện cả về thiết kế, cấu hình, camera lẫn tính năng, hứa hẹn sẽ tạo ra một cuộc cách mạng mới cho thị trường di động.	https://cellphones.com.vn/apple-iphone-x-64-gb.html
4	Apple iPhone 8 Plus 64GB	Apple iPhone 8 Plus 64GB (Nhập khẩu)\r\nNhững điện thoại cao cấp màn hình lớn chạy Android có lý do để lo lắng khi siêu phẩm iPhone 8 Plus đã chính thức trình làng với nhiều cải tiến giá trị so với các phiên bản cũ.	https://cellphones.com.vn/apple-iphone-8-plus-64-gb.html
5	Apple iPhone 8 64GB	Apple iPhone 8 64GB (Nhập khẩu)\r\nSiêu phẩm smartphone 2017 - iPhone 8 đã chính thức được Apple ra mắt với nhiều cải tiến giá trị so với người tiền nhiệm iPhone 7, hứa hẹn một năm bội thu cho gã khổng lồ xứ Cupertino.	https://cellphones.com.vn/apple-iphone-8-64-gb.html
6	Apple iPhone 7 Plus 128GB (Certified Pre-Owned)	Apple iPhone 7 Plus 128GB (CPO)\r\niPhone 7 Plus 128GB (CPO) hay (Certified Pre-Owned) là những sản phẩm bị lỗi nhỏ như trầy xước, lỗi phần mềm được Apple tân trang và kiểm định nhưng vẫn được bảo hành tương tự máy mới, do đó có giá bán rẻ hơn, giúp người dùng tiết kiệm được một khoản chi phí đáng kể.	https://cellphones.com.vn/iphone-7-plus-128-gb-cpo.html
7	Apple iPhone 6S 64GB cũ (99%)	iPhone 6S 64 GB cũ, mới 99% (Hàng nhập khẩu)\r\niPhone 6S dù đã ra mắt từ năm 2015 nhưng vẫn luôn có sức hút lớn với người dùng nhờ vào thiết kế sang trọng, hiệu năng mạnh mẽ và chất lượng đã được khẳng định của một sản phẩm mang thương hiệu Apple.	https://cellphones.com.vn/iphone-6s-64-gb-cu.html
8	Samsung Galaxy A9 (2018) Chính Hãng	Samsung Galaxy A9 2018 - Cấu hình và giá bán\r\nCuộc đua trên thị trường công nghệ đang diễn ra vô cùng khốc liệt khi các nhà sản xuất thay phiên nhau thiết lập nên những cột mốc mới, chẳng hạn như cách mà hãng điện thoại Samsung trang bị đến 4 camera sau cho Samsung Galaxy A9 2018	https://cellphones.com.vn/samsung-galaxy-a9-2018-chinh-hang.html
9	Samsung Galaxy A7 (2018) Chính hãng	Samsung Galaxy A7 2018 - Giá bán, cấu hình chi tiết, quà tặng hấp dẫn\r\nĐiện thoại Samsung Galaxy A7 2018 Chính hãng là mẫu smartphone tầm trung mới nhất của Samsung. Là bản nâng cấp của Samsung Galaxy A7 2017 nền Samsung Galaxy A7 (2018) mang thiết kế khá giống với người tiền nhiệm, đặc biệt lần này, Samsung đã mạnh tay trang bị camera kép cho thiết bị tầm trung của họ.	https://cellphones.com.vn/samsung-galaxy-a7-2018-chinh-hang.html
10	Samsung Galaxy J6 Plus Chính Hãng	Samsung Galaxy J6 Plus Chính hãng\r\nDòng Galaxy J của Samsung hiện đang khuynh đảo nhóm tầm trung với thiết kế bắt mắt, cấu hình khá và camera chất lượng. Sắp tới đây, công ty Hàn Quốc có thể bổ sung thêm vào dòng sản phẩm này chiếc Galaxy J6 Plus sẽ đem đến những trải nghiệm tốt cho người dùng.	https://cellphones.com.vn/samsung-galaxy-j6-plus-chinh-hang.html
11	Samsung Galaxy S8+ Chính hãng	Samsung Galaxy S8 Plus chính hãng\r\nSau thành công vang dội của bộ đôi Galaxy S7, Galaxy S7 Edge, Samsung tiếp tục mang đến cho thị trường nhiều bất ngờ với cặp Galaxy S8/S8 Plus sở hữu thiết kế độc đáo và nhiều tính năng mới thú vị. Trong đó, Galaxy S8 Plus được dự báo sẽ là đối thủ xứng tầm của dòng iPhone Plus.	https://cellphones.com.vn/galaxy-s8plus-cty.html
12	Samsung Galaxy S9+ (Plus) 64GB Chính hãng	Samsung Galaxy S9 Plus Chính hãng\r\nTrong năm 2018, hãng điện thoại Samsung sẽ tiếp tục trình làng một số sản phẩm smartphone của hãng hứa hẹn sẽ gây bão cộng đồng công nghệ. Đặc biệt sản phẩm cao cấp nhất là Samsung Galaxy S9 Plus Chính hãng là sản phẩm đáng mong chờ nhất với thiết kế tổng quát không khác nhiều so với S8. Thay vào đó, Samsung sẽ nâng cấp đáng kể về mặt cấu hình cho flagship này.	https://cellphones.com.vn/samsung-galaxy-s9plus-chinh-hang.html
13	Samsung Galaxy S8 Chính hãng cũ (99%)	Sản phẩm hàng cũ	https://cellphones.com.vn/galaxy-s8-cty-cu.html
14	Xiaomi Redmi S2 64GB Chính hãng (Redmi Y2)	Xiaomi Redmi S2 64GB Chính hãng\r\nKể từ khi thành lập, hãng điện thoại Xiaomi luôn bán smartphone sở hữu những tính năng hiện đại nhưng giá bán lại rất phải chăng điển hình như Redmi 5, Redmi 5 Plus, Redmi 5A... Xiaomi Redmi S2 64GB chính là sản phẩm tiếp theo khẳng định rất rõ triết lý kinh doanh của hãng.	https://cellphones.com.vn/xiaomi-redmi-s2-64-gb-chinh-hang.html
15	Xiaomi Mi 8 Lite 64GB Chính hãng	Xiaomi Mi 8 Lite - Cấu hình chi tiết, giá bán, chương trình khuyến mãi\r\nVới Mi 8 Lite sở hữu cấu hình mạnh mà giá bán lại rất phải chăng, Xiaomi tiếp tục mang đến cho người dùng một sự lựa chọn chất lượng ở phân khúc tầm trung.	https://cellphones.com.vn/xiaomi-mi-8-lite-64-gb-chinh-hang.html
16	Xiaomi Mi 8 64GB Chính hãng	Xiaomi Mi 8 64GB Chính hãng\r\nXiaomi tiếp tục trình làng mẫu flagship Xiaomi Mi 8 64GB Chính hãng là phiên bản cao cấp nhất so với người anh em của nó là Xiaomi Mi 6. Xiaomi Mi 8 sở hữu đầy đủ các tính năng của một smartphone cao cấp và các xu hướng smartphone năm 2018. Sản phẩm hứa hẹn sẽ đem đến cho người dùng nhiều trải nghiệm tuyệt vời.	https://cellphones.com.vn/xiaomi-mi-8-64-gb-chinh-hang.html
17	ASUS ZenFone Max Pro M1 32GB Chính hãng	ASUS ZenFone Max Pro M1 32GB Chính hãng\r\nVừa qua vào ngày 23/4 nhà sản xuất điện thoại và máy tính nổi tiếng trên thế giới vừa cho ra mắt dòng điện thoại thông minh ASUS ZenFone Max Pro M1 32GB Chính hãng. Đây là sản phẩm có mức giá cực kỳ tốt cùng với cấu hình và tính năng hấp dẫn, hứa hẹn sẽ được lòng người dùng và đáng để sở hữu.	https://cellphones.com.vn/asus-zenfone-max-pro-m1-32-gb-chinh-hang.html
18	ASUS ZenFone Max Pro M1 64GB Chính hãng	ASUS ZenFone Max Pro M1 64GB Chính hãng\r\nKhông thật sự tạo nên nhiều tiếng vang nhưng những smartphone của hãng điện thoại ASUS vẫn được đánh giá cao bởi phần cứng chất lượng mà giá bán lại rất phải chăng, chẳng hạn như mẫu ZenFone Max Pro M1 64GB.	https://cellphones.com.vn/asus-zenfone-max-pro-m1-64-gb-chinh-hang.html
19	ASUS ZenFone Max Pro M1 6GB RAM 64GB Chính hãng	ASUS ZenFone Max Pro M1 6GB RAM 64GB Chính hãng\r\nKể từ khi được lột xác trong thiết kế, các sản phẩm của Asus đã chiếm được trái tim của đông đảo người dùng. Điện thoại ASUS ZenFone Max Pro M1 6GB RAM 64GB Chính hãng được ra mắt để tiếp tục làm hài lòng nhiều khách hàng hơn nữa.	https://cellphones.com.vn/asus-zenfone-max-pro-m1-6-gb-ram-64-gb-chinh-hang.html
20	ASUS ZenFone Max Plus M1 Chính hãng	ASUS ZenFone Max Plus M1 Chính hãng\r\nHãng Asus vừa trình làng một thành viên trong gia đình Zefone Max là Max M1. Sản phẩm được kế thừa và nâng cấp từ những gì tinh túy nhất của đời trước. Đặc biệt, lần này Asus đã bắt kịp xu hướng hiện nay là trang bị màn hình FullView tỉ lệ 18:9 trên chiếc máy này.	https://cellphones.com.vn/asus-zenfone-max-plus-m1-chinh-hang.html
\.


--
-- Data for Name: Product; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Product" (id, "productName", "productOtherNames", "productCategoryId", "productManufacturerId", "productPostId") FROM stdin;
1	iPhone XS Max	iPhone XS Max; ip XS; ip Max; iphone Max; iphone max; ip max; ip xs max; ip x	1	1	1
2	Samsung Galaxy Note 9	Samsung Galaxy Note 9	2	2	2
3	Iphone X	Iphone X	1	1	3
4	Apple iPhone 8 Plus 64GB	Apple iPhone 8 Plus 64GB	1	1	4
5	Apple iPhone 8 64GB	Apple iPhone 8 64GB	1	1	5
6	Apple iPhone 7 Plus 128GB (Certified Pre-Owned)	Apple iPhone 7 Plus 128GB (Certified Pre-Owned)	1	1	6
7	Apple iPhone 6S 64GB cũ (99%)	Apple iPhone 6S 64GB cũ (99%)	1	1	7
8	Samsung Galaxy A9	Samsung Galaxy A9	2	2	8
9	Samsung Galaxy A7	Samsung Galaxy A7	2	2	9
10	Samsung Galaxy J6 Plus	Samsung Galaxy J6 Plus	2	2	10
11	Samsung Galaxy S8+	Samsung Galaxy S8+, SS8+, S8+	2	2	11
12	Samsung Galaxy S9+	Samsung Galaxy S9+, S9 Plus, Samsung Galaxy S9 Plus	2	2	12
13	Samsung Galaxy S8 cũ	Samsung Galaxy S8 cũ, S8 cũ	2	2	13
14	Xiaomi Redmi S2 64GB	Xiaomi Redmi S2 64GB, xiaomi rdmi S2	5	3	14
15	Xiaomi Mi 8 Lite 64GB	Xiaomi Mi 8 Lite 64GB | Xiaomi Mi 8 | mi 8	4	3	15
16	Xiaomi Mi 8 64GB	Xiaomi Mi 8 64GB	4	3	16
17	ASUS ZenFone Max Pro M1 32GB	ASUS ZenFone Max Pro M1 32GB | asus zen | asus zenfone max	7	4	17
18	ASUS ZenFone Max Pro M1 64GB	ASUS ZenFone Max Pro M1 64GB	7	3	18
19	ASUS ZenFone Max Pro M1 6GB RAM 64GB	ASUS ZenFone Max Pro M1 6GB RAM 64GB	7	4	19
20	ASUS ZenFone Max Plus M1	ASUS ZenFone Max Plus M1	7	4	20
\.


--
-- Data for Name: SaleOff; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."SaleOff" (id, "saleOffPrice", "dateStart", "dateEnd", other, "productId", "saleOffName") FROM stdin;
18	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	18	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1
19	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	19	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1 6GB RAM 64GB
20	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	20	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Plus M1
6	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	7	Giảm giá bao ốp da khi mua điện thoại Iphone 6S 64GB cũ (99%)
5	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	6	Giảm giá bao ốp da khi mua điện thoại Iphone 7
3	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	4	Giảm giá bao ốp da khi mua điện thoại Iphone 8 Plus
4	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	5	Giảm giá bao ốp da khi mua điện thoại Iphone 8
2	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	3	Giảm giá bao ốp da khi mua điện thoại Iphone X
1	2	2018-11-12	2018-11-30	Loa Bluetooth iCutes MB-M615 Mặt cười	1	Giảm giá điện thoại Iphone XS Max
7	0	2018-11-12	2018-12-31	Giảm thêm 1.500.000đ qua Galaxy Gift	8	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9
8	0	2018-11-12	2019-04-20	Tặng Loa Anker Soundcore Mini 2, PIN DỰ PHÒNG ENERGIZER 10000 MAH UE10012 ĐEN	8	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9
9	0.5	2018-11-12	2019-04-20	Tặng phiếu mua hàng 700.000đ	9	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A7
10	0.299999999999999989	2018-11-12	2019-04-20	Tặng phiếu mua hàng 500.000đ	10	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy J6 Plus
11	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	11	Giảm giá bao ốp da khi mua điện thoại Galaxy S8+
12	0	2018-11-12	2019-07-19	Tặng Màn hình máy tính Samsung 27' (C27F390FHE) trị giá 5.1 triệu đồng	12	Giảm giá bao ốp da khi mua điện thoại Galaxy S9+
13	0	2018-11-12	2018-12-31	Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán	13	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy S8 cũ
14	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	14	Giảm giá bao ốp da khi mua điện thoại Redmi S2
15	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	15	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8 Lite
16	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	16	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8
17	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	17	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1
\.


--
-- Data for Name: StoreInventory; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."StoreInventory" (id, amount, "productId", "storeId") FROM stdin;
169	14	15	8
1	32	1	1
2	12	1	3
3	0	1	4
4	22	2	8
5	14	2	4
6	34	2	9
7	25	2	12
8	17	2	7
9	27	2	3
10	27	2	11
11	27	2	11
12	27	2	13
13	34	2	14
14	12	2	16
15	15	2	18
16	15	2	22
17	16	2	19
18	12	2	17
19	12	3	8
20	12	3	4
21	12	3	1
22	12	3	9
23	12	3	12
24	12	3	7
25	12	3	6
26	12	3	3
27	12	3	11
28	12	3	5
29	12	3	10
30	20	3	13
31	92	3	21
32	2	3	22
33	72	3	17
34	66	4	8
35	93	4	4
36	60	4	12
37	78	4	7
38	90	4	14
39	87	4	15
40	54	4	19
41	41	4	17
42	32	5	16
43	23	5	19
44	25	5	17
45	71	6	8
46	10	6	11
47	8	6	13
48	2	6	14
49	33	6	18
50	8	6	20
51	18	6	21
52	7	6	15
53	25	6	22
54	51	6	19
55	85	6	17
56	28	7	8
57	7	7	1
58	91	7	4
59	76	7	9
60	87	7	7
61	17	7	10
62	96	7	13
63	22	7	14
64	61	7	16
65	21	7	20
66	97	7	21
67	26	7	15
68	59	7	22
69	26	7	19
70	32	7	17
71	8	8	13
72	74	8	14
73	46	8	16
74	73	8	18
75	55	8	20
76	92	8	21
77	78	8	15
78	38	8	22
79	21	8	19
80	92	8	17
81	85	8	8
82	53	8	25
83	46	8	1
84	45	8	4
85	35	8	9
86	32	8	27
87	98	8	12
88	7	8	7
89	85	8	28
90	37	8	24
91	19	8	26
92	31	8	32
93	69	8	3
94	41	8	30
95	29	8	11
96	19	8	23
97	100	8	10
98	100	9	8
99	41	9	25
100	12	9	31
101	2	9	1
102	12	9	4
103	11	9	9
104	12	9	27
105	1	9	12
106	10	9	7
107	10	9	13
108	10	9	14
109	12	9	18
110	6	9	20
111	11	9	19
112	14	9	17
113	13	10	13
114	11	10	18
115	8	10	22
116	7	10	17
117	15	10	8
118	15	10	31
119	6	10	4
120	2	10	7
121	2	10	3
122	10	10	5
123	7	10	10
124	11	11	25
125	7	11	31
126	5	11	1
127	10	11	6
128	11	11	5
129	10	11	14
130	8	11	16
131	8	11	18
132	9	11	21
133	10	11	17
134	5	12	13
135	8	12	18
136	7	12	20
137	7	12	21
138	11	12	22
139	3	12	1
140	2	12	4
141	2	12	6
142	2	12	32
143	3	12	11
144	10	14	8
145	11	14	25
146	8	14	31
147	14	14	1
148	6	14	4
149	2	14	9
150	3	14	11
151	7	14	10
152	2	14	13
153	2	14	14
154	8	14	16
155	11	14	18
156	5	14	20
157	10	14	22
158	11	14	19
159	3	14	17
160	4	15	13
161	12	15	14
162	8	15	16
163	13	15	18
164	14	15	20
165	14	15	21
166	3	15	15
167	9	15	22
168	13	15	17
170	2	15	25
171	3	15	31
172	5	15	11
173	15	15	10
174	9	16	8
175	5	16	25
176	8	16	26
177	12	16	10
178	3	16	18
179	6	16	21
180	5	17	13
181	14	17	14
182	6	17	18
183	9	17	19
184	13	17	17
185	10	17	8
186	7	17	25
187	7	17	31
188	10	17	4
189	9	17	11
190	1	17	10
191	9	18	8
192	10	18	25
193	4	18	31
194	15	18	4
195	7	18	9
196	13	18	27
197	7	18	13
198	13	18	16
199	3	18	18
200	2	18	20
201	12	18	21
202	8	18	15
203	6	18	17
204	12	20	13
205	15	20	22
\.


--
-- Data for Name: Store_CT; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Store_CT" (id, "storeName", address1, address2, "City", district, street, province, "storePayment") FROM stdin;
24	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	Hồ Chí Minh	Quận 9	Lê Văn Việt	Miền Nam	Tiền mặt
25	CellphoneS 288 Đường 3/2, P. 12, Q. 10	CellphoneS 288 Đường 3/2, P. 12, Q. 10	CellphoneS 288 Đường 3/2, P. 12, Q. 10	Hồ Chí Minh	Quận 10	Đường 3/2	Miền Nam	Tiền mặt
26	CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	Hồ Chí Minh	Quận Thủ Đức	Võ Văn Ngân	Miền Nam	Tiền mặt
3	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	Hồ Chí Minh	Phú Nhuận	Phan Đăng Lưu	Miền Nam	Tiền mặt
1	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình	Hồ Chí Minh	Tân Bình	Âu Cơ	Miền Nam	Tiền mặt
4	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	Hồ Chí Minh	Tân Bình	Cộng Hòa	Miền Nam	Tiền mặt
5	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	Hồ Chí Minh	Quận 6	Hậu Giang	Miền Nam	Tiền mặt
6	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	Hồ Chí Minh	Quận 9	Lê Văn Việt	Miền Nam	Tiền mặt
7	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	Hồ Chí Minh	Quận 1	Nguyễn Thái Học	Miền Nam	Tiền mặt
8	CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	Hồ Chí Minh	Quận 1	Nguyễn Thị Minh Khai	Miền Nam	Tiền mặt
9	CellphoneS 177 Khánh Hội, P. 3, Q. 4	CellphoneS 177 Khánh Hội, P. 3, Q. 4	CellphoneS 177 Khánh Hội, P. 3, Q. 4	Hồ Chí Minh	Quận 4	Khánh Hội	Miền Nam	Tiền mặt
10	CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9	CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9	CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9	Hồ Chí Minh	Quận 9	Đỗ Xuân Hợp	Miền Nam	Tiền mặt
11	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	Hồ Chí Minh	Quận 7	Nguyễn Thị Thập	Miền Nam	Tiền mặt
12	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3	Hồ Chí Minh	Quận 3	Võ Văn Tần	Miền Nam	Tiền mặt
13	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	Hà Nội	Long Biên	Nguyễn Văn Cừ	Miền Bắc	Tiền mặt
14	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa	Hà Nội	Đống Đa	Thái Hà	Miền Bắc	Tiền mặt
15	CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	Hà Nội	Cầu Giấy	Nguyễn Khánh Toàn	Miền Bắc	Tiền mặt
16	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa	Hà Nội	Đống Đa	Thái Hà	Miền Bắc	Tiền mặt
17	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội	Hà Nội	Thanh Xuân	Khương Đình	Miền Bắc	Tiền mặt
18	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	Hà Nội	Hoàn Kiếm	Hàng Bài	Miền Bắc	Tiền mặt
19	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	Hà Nội	Cầu Giấy	Hồ Tùng Mậu	Miền Bắc	Tiền mặt
20	CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	Hà Nội	Cầu Giấy	Cầu Giấy, P. Dịch Vọng	Miền Bắc	Tiền mặt
21	CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	Hà Nội	Hai Bà Trưng	Bạch Mai, P. Trương Định	Miền Bắc	Tiền mặt
22	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	Hà Nội	Thanh Xuân	Nguyễn Trãi, P. Thanh Xuân Nam	Miền Bắc	Tiền mặt
23	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	CellphoneS 1075B Hậu Giang, P. 11, Q. 6	Hồ Chí Minh	Quận 6	Hậu Giang	Miền Nam	Tiền mặt
27	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	Hồ Chí Minh	Quận Gò Vấp	Nguyễn Kiệm	Miền Nam	Tiền mặt
28	CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	Hồ Chí Minh	Quận  Bình Thạnh	Xô Viết Nghệ Tĩnh	Miền Nam	Tiền mặt
29	CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1	CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1	CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1	Hồ Chí Minh	Quận 1	Trần Quang Khải	Miền Nam	Tiền mặt
30	CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	Hồ Chí Minh	Quận 12	Nguyễn Ảnh Thủ	Miền Nam	Tiền mặt
31	CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp	CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp	CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp	Hồ Chí Minh	Quận Gò Vấp	Quang Trung	Miền Nam	Tiền mặt
32	CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	Hồ Chí Minh	Huyện Bình Chánh	Quốc lộ 50	Miền Nam	Tiền mặt
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
25	Can add category	7	add_category
26	Can change category	7	change_category
27	Can delete category	7	delete_category
28	Can view category	7	view_category
29	Can add guarantee	8	add_guarantee
30	Can change guarantee	8	change_guarantee
31	Can delete guarantee	8	delete_guarantee
32	Can view guarantee	8	view_guarantee
33	Can add installment	9	add_installment
34	Can change installment	9	change_installment
35	Can delete installment	9	delete_installment
36	Can view installment	9	view_installment
37	Can add language support	10	add_languagesupport
38	Can change language support	10	change_languagesupport
39	Can delete language support	10	delete_languagesupport
40	Can view language support	10	view_languagesupport
41	Can add manufacturer	11	add_manufacturer
42	Can change manufacturer	11	change_manufacturer
43	Can delete manufacturer	11	delete_manufacturer
44	Can view manufacturer	11	view_manufacturer
45	Can add phone code	12	add_phonecode
46	Can change phone code	12	change_phonecode
47	Can delete phone code	12	delete_phonecode
48	Can view phone code	12	view_phonecode
49	Can add phone feature	13	add_phonefeature
50	Can change phone feature	13	change_phonefeature
51	Can delete phone feature	13	delete_phonefeature
52	Can view phone feature	13	view_phonefeature
53	Can add phone info	14	add_phoneinfo
54	Can change phone info	14	change_phoneinfo
55	Can delete phone info	14	delete_phoneinfo
56	Can view phone info	14	view_phoneinfo
57	Can add post	15	add_post
58	Can change post	15	change_post
59	Can delete post	15	delete_post
60	Can view post	15	view_post
61	Can add product	16	add_product
62	Can change product	16	change_product
63	Can delete product	16	delete_product
64	Can view product	16	view_product
65	Can add sale off	17	add_saleoff
66	Can change sale off	17	change_saleoff
67	Can delete sale off	17	delete_saleoff
68	Can view sale off	17	view_saleoff
69	Can add store	18	add_store
70	Can change store	18	change_store
71	Can delete store	18	delete_store
72	Can view store	18	view_store
73	Can add store inventory	19	add_storeinventory
74	Can change store inventory	19	change_storeinventory
75	Can delete store inventory	19	delete_storeinventory
76	Can view store inventory	19	view_storeinventory
\.


--
-- Data for Name: auth_user; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_user (id, password, last_login, is_superuser, username, first_name, last_name, email, is_staff, is_active, date_joined) FROM stdin;
1	pbkdf2_sha256$120000$8F1QhWa7bQgD$ibrR/c+1ki4lE37VaG/Gs0KnSx5uNzCwYdgcY9SzV3k=	2018-11-27 21:22:41.690675+07	t	congtran			cong@gmail.com	t	t	2018-11-12 21:54:08.12945+07
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
1	2018-11-12 22:02:55.572844+07	1	Store object (1)	1	[{"added": {}}]	18	1
2	2018-11-12 22:15:44.521745+07	1	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	2	[]	18	1
3	2018-11-12 22:16:13.365819+07	1	Iphone	1	[{"added": {}}]	7	1
4	2018-11-12 22:21:02.44997+07	1	Apple	1	[{"added": {}}]	11	1
5	2018-11-12 22:21:21.902803+07	1	Tiếng Việt	1	[{"added": {}}]	10	1
6	2018-11-12 22:24:13.343183+07	1	Apple iPhone XS Max 64GB Chính hãng (VN/A)	1	[{"added": {}}]	15	1
7	2018-11-12 22:24:26.258041+07	1	Apple iPhone XS Max	1	[{"added": {}}]	16	1
8	2018-11-12 22:24:42.062922+07	1	iPhone XS Max	2	[{"changed": {"fields": ["productName"]}}]	16	1
9	2018-11-12 23:16:11.920825+07	1	PhoneFeature	1	[{"added": {}}]	13	1
10	2018-11-12 23:17:28.547442+07	1	VN/A	1	[{"added": {}}]	12	1
11	2018-11-12 23:29:02.648786+07	5	Phone Info	1	[{"added": {}}]	14	1
12	2018-11-12 23:30:19.177424+07	5	Phone Info	2	[]	14	1
13	2018-11-12 23:31:47.436082+07	1	PhoneInfo_phoneLanguage object (1)	2	[]	20	1
14	2018-11-12 23:31:55.080065+07	1	PhoneInfo_phoneLanguage object (1)	2	[]	20	1
15	2018-11-12 23:32:39.413947+07	1	StoreInventory: iPhone XS Max - amount:32	1	[{"added": {}}]	19	1
16	2018-11-12 23:36:28.674699+07	1	Giảm giá điện thoại Iphone XS Max - [discount]:29.8 - duration: 2018-11-12-2018-11-24 	1	[{"added": {}}]	17	1
17	2018-11-12 23:41:47.035047+07	1	FE CREDIT	1	[{"added": {}}]	9	1
18	2018-11-12 23:41:57.428028+07	1	Installment_productId object (1)	2	[]	21	1
19	2018-11-12 23:43:35.35395+07	1	Bảo hành điện thoại Iphone XS Max	1	[{"added": {}}]	8	1
20	2018-11-12 23:43:44.976139+07	1	Guarantee_productId object (1)	2	[]	22	1
21	2018-11-13 00:25:01.141148+07	1	iPhone XS Max	2	[]	13	1
22	2018-11-13 10:33:44.922192+07	5	iPhone XS Max	2	[]	14	1
23	2018-11-13 10:35:08.996048+07	5	iPhone XS Max	2	[{"changed": {"fields": ["ROM", "price1", "price2"]}}]	14	1
24	2018-11-13 10:35:24.89969+07	5	iPhone XS Max	2	[]	14	1
25	2018-11-13 10:35:57.114343+07	5	iPhone XS Max	2	[]	14	1
26	2018-11-13 10:41:04.77251+07	6	iPhone XS Max	1	[{"added": {}}]	14	1
27	2018-11-13 11:17:04.936537+07	7	iPhone XS Max - 64 GB	1	[{"added": {}}]	14	1
28	2018-11-13 11:18:01.086894+07	6	iPhone XS Max - 64 GB - Vàng	2	[{"changed": {"fields": ["color", "price1", "price2"]}}]	14	1
29	2018-11-13 11:18:13.404516+07	5	iPhone XS Max - 512 GB - Vàng	2	[{"changed": {"fields": ["color"]}}]	14	1
30	2018-11-13 11:35:55.220413+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-24 	2	[{"changed": {"fields": ["saleOffPrice"]}}]	17	1
31	2018-11-13 11:36:54.952813+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-12 	2	[{"changed": {"fields": ["dateStart", "dateEnd"]}}]	17	1
32	2018-11-13 11:47:48.117563+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-14 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
33	2018-11-13 13:30:36.400955+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-14 	2	[{"changed": {"fields": ["other"]}}]	17	1
34	2018-11-13 13:32:31.369241+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-12 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
35	2018-11-13 13:33:54.89882+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-14 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
36	2018-11-13 13:40:38.947008+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-12 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
37	2018-11-13 13:40:51.173657+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-14 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
38	2018-11-13 14:03:38.578445+07	6	iPhone XS Max - 64 GB - Vàng	2	[]	14	1
39	2018-11-13 14:39:40.296178+07	2	Tiếng anh	1	[{"added": {}}]	10	1
40	2018-11-13 14:39:52.407544+07	7	iPhone XS Max - 64 GB - Xám	2	[{"changed": {"fields": ["phoneLanguage"]}}]	14	1
41	2018-11-13 14:40:03.117164+07	7	iPhone XS Max - 64 GB - Xám	2	[]	14	1
42	2018-11-13 14:40:44.344717+07	2	Tiếng Anh	2	[{"changed": {"fields": ["languageName"]}}]	10	1
43	2018-11-13 14:52:04.579248+07	6	iPhone XS Max - 64 GB - Vàng	2	[{"changed": {"fields": ["version"]}}]	14	1
44	2018-11-13 14:54:19.324438+07	7	iPhone XS Max - 64 GB - Xám	2	[]	14	1
45	2018-11-13 14:58:31.686682+07	5	iPhone XS Max - 512 GB - Vàng	2	[{"changed": {"fields": ["status"]}}]	14	1
46	2018-11-13 14:58:38.34901+07	7	iPhone XS Max - 64 GB - Xám	2	[]	14	1
47	2018-11-13 14:59:49.581375+07	6	iPhone XS Max - 64 GB - Vàng	2	[{"changed": {"fields": ["status"]}}]	14	1
48	2018-11-13 15:21:55.72667+07	1	iPhone XS Max feature	2	[{"changed": {"fields": ["featureTimeUsing"]}}]	13	1
49	2018-11-13 15:22:58.837134+07	1	iPhone XS Max feature	2	[]	13	1
50	2018-11-13 15:23:20.07421+07	1	iPhone XS Max feature	2	[{"changed": {"fields": ["featureTimeUsing"]}}]	13	1
51	2018-11-13 15:42:13.481454+07	1	StoreInventory: iPhone XS Max - amount: 0	2	[{"changed": {"fields": ["amount"]}}]	19	1
52	2018-11-13 15:42:36.294648+07	1	StoreInventory: iPhone XS Max - amount: 32	2	[{"changed": {"fields": ["amount"]}}]	19	1
53	2018-11-14 00:31:29.321131+07	1	CellphoneS 4B Cộng Hoà	2	[{"changed": {"fields": ["storeName"]}}]	18	1
54	2018-11-16 10:42:25.677716+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-23 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
55	2018-11-16 10:47:20.51383+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-14 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
56	2018-11-16 10:53:24.089426+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-07 - 2018-11-17 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
57	2018-11-16 11:13:36.601974+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-15 - 2018-11-17 	2	[{"changed": {"fields": ["dateStart"]}}]	17	1
58	2018-11-16 11:14:06.629057+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-15 	2	[{"changed": {"fields": ["dateStart", "dateEnd"]}}]	17	1
59	2018-11-16 15:24:22.0584+07	1	iPhone XS Max feature	2	[{"changed": {"fields": ["game"]}}]	13	1
60	2018-11-16 15:48:35.609324+07	1	FE CREDIT	2	[{"changed": {"fields": ["note"]}}]	9	1
61	2018-11-16 15:48:53.836194+07	1	FE CREDIT	2	[{"changed": {"fields": ["note"]}}]	9	1
62	2018-11-16 16:06:39.281801+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-17 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
63	2018-11-17 10:01:24.427792+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-16 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
126	2018-12-03 19:59:34.466892+07	2	Samsung Galaxy Note 9 Chính hãng	1	[{"added": {}}]	15	1
64	2018-11-17 16:53:24.073825+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-18 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
65	2018-11-17 16:56:24.265834+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-18 	2	[{"changed": {"fields": ["other"]}}]	17	1
66	2018-11-17 16:56:51.166691+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-18 	2	[{"changed": {"fields": ["other"]}}]	17	1
67	2018-11-17 18:44:38.094149+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-16 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
68	2018-11-20 18:13:07.811645+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-21 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
69	2018-11-27 21:23:47.449661+07	1	iPhone XS	2	[{"changed": {"fields": ["productName"]}}]	16	1
70	2018-11-27 21:37:06.306748+07	1	iPhone XS Max	2	[{"changed": {"fields": ["productName"]}}]	16	1
71	2018-11-27 22:46:09.347022+07	6	iPhone XS Max - 64 GB - vàng	2	[{"changed": {"fields": ["color"]}}]	14	1
72	2018-11-27 22:46:15.699598+07	6	iPhone XS Max - 64 GB - vàng	2	[]	14	1
73	2018-11-27 22:46:44.676686+07	1	iPhone XS Max	2	[]	16	1
74	2018-11-28 14:33:00.536457+07	2	CellphoneS 4B Cộng Hoà	1	[{"added": {}}]	18	1
75	2018-11-29 16:09:09.708801+07	2	CellphoneS 4B Cộng Hoà	3		18	1
76	2018-11-29 16:26:40.829227+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-30 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
77	2018-11-29 22:49:40.481987+07	1	CellphoneS 4B Cộng Hoà	2	[{"changed": {"fields": ["street"]}}]	18	1
78	2018-11-29 23:39:20.163293+07	6	iPhone XS Max - 64 GB - vàng	2	[{"changed": {"fields": ["status"]}}]	14	1
79	2018-11-29 23:39:47.24845+07	6	iPhone XS Max - 64 GB - vàng	2	[{"changed": {"fields": ["status"]}}]	14	1
80	2018-11-30 00:23:29.54226+07	3	114 Phan Đăng Lưu, phường 3, Phú Nhuận	1	[{"added": {}}]	18	1
81	2018-11-30 00:23:56.829191+07	3	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận	2	[{"changed": {"fields": ["storeName", "address1", "address2"]}}]	18	1
82	2018-11-30 00:25:37.653707+07	1	CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình	2	[{"changed": {"fields": ["storeName", "address1", "address2", "street"]}}]	18	1
83	2018-11-30 00:26:09.170498+07	4	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình	1	[{"added": {}}]	18	1
84	2018-11-30 01:34:54.637255+07	2	StoreInventory: iPhone XS Max - amount: 12	1	[{"added": {}}]	19	1
85	2018-11-30 01:35:02.504209+07	3	StoreInventory: iPhone XS Max - amount: 0	1	[{"added": {}}]	19	1
86	2018-11-30 17:04:54.885721+07	6	iPhone XS Max - 64 GB - vàng	2	[]	14	1
87	2018-11-30 17:05:13.780647+07	7	iPhone XS Max - 64 GB - Xám	2	[]	14	1
88	2018-11-30 17:05:23.118843+07	5	iPhone XS Max - 512 GB - Vàng	2	[]	14	1
89	2018-11-30 17:05:34.832768+07	6	iPhone XS Max - 64 GB - vàng	2	[]	14	1
90	2018-11-30 17:13:48.404293+07	6	iPhone XS Max - 64 GB - vàng	2	[{"changed": {"fields": ["chargerTime"]}}]	14	1
91	2018-11-30 17:14:03.176543+07	6	iPhone XS Max - 64 GB - vàng	2	[{"changed": {"fields": ["chargerTime"]}}]	14	1
92	2018-11-30 19:00:16.798663+07	7	iPhone XS Max - 64 GB - Xám; Xám bạc; Bạc	2	[{"changed": {"fields": ["color"]}}]	14	1
93	2018-11-30 19:09:22.365577+07	7	iPhone XS Max - 64 GB - Xám, Xám bạc, Bạc	2	[{"changed": {"fields": ["color"]}}]	14	1
94	2018-11-30 23:40:36.586617+07	1	FE CREDIT	2	[{"changed": {"fields": ["requiredInformation"]}}]	9	1
95	2018-12-01 10:52:32.242168+07	1	iPhone XS Max	2	[{"changed": {"fields": ["productOtherNames"]}}]	16	1
96	2018-12-03 15:30:48.282861+07	5	Hồ Chí Minh - CellphoneS 1075B Hậu Giang, P. 11, Q. 6	1	[{"added": {}}]	18	1
97	2018-12-03 15:31:47.144958+07	6	Hồ Chí Minh - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	1	[{"added": {}}]	18	1
98	2018-12-03 15:32:20.134726+07	7	Hồ Chí Minh - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1	1	[{"added": {}}]	18	1
99	2018-12-03 15:32:51.39579+07	8	Hồ Chí Minh - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1	1	[{"added": {}}]	18	1
100	2018-12-03 15:33:25.683217+07	9	Hồ Chí Minh - CellphoneS 177 Khánh Hội, P. 3, Q. 4	1	[{"added": {}}]	18	1
101	2018-12-03 15:33:49.336535+07	10	Hồ Chí Minh - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9	1	[{"added": {}}]	18	1
102	2018-12-03 15:34:13.335249+07	11	Hồ Chí Minh - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7	1	[{"added": {}}]	18	1
103	2018-12-03 15:34:36.829718+07	12	Hồ Chí Minh - CellphoneS 288 Đường 3/2, P. 12, Q. 10	1	[{"added": {}}]	18	1
104	2018-12-03 15:35:05.3675+07	12	Hồ Chí Minh - CellphoneS 363 Võ Văn Tần, P. 5, Q. 3	2	[{"changed": {"fields": ["storeName", "address1", "address2", "district", "street"]}}]	18	1
105	2018-12-03 15:36:51.541364+07	13	Hà Nội - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên	1	[{"added": {}}]	18	1
106	2018-12-03 15:37:20.71771+07	14	Hà Nội - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa	1	[{"added": {}}]	18	1
107	2018-12-03 15:37:45.909568+07	15	Hà Nội - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy	1	[{"added": {}}]	18	1
108	2018-12-03 15:38:12.622011+07	16	Hà Nội - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa	1	[{"added": {}}]	18	1
109	2018-12-03 15:38:56.967787+07	17	Hà Nội - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội	1	[{"added": {}}]	18	1
110	2018-12-03 15:39:24.667568+07	18	Hà Nội - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm	1	[{"added": {}}]	18	1
111	2018-12-03 15:39:46.49887+07	19	Hà Nội - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội	1	[{"added": {}}]	18	1
112	2018-12-03 15:40:09.939365+07	20	Hà Nội - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy	1	[{"added": {}}]	18	1
113	2018-12-03 15:40:32.731251+07	21	Hà Nội - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng	1	[{"added": {}}]	18	1
114	2018-12-03 15:40:54.396376+07	22	Hà Nội - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân	1	[{"added": {}}]	18	1
115	2018-12-03 19:49:23.266459+07	2	Sam Sung Galaxy	1	[{"added": {}}]	7	1
116	2018-12-03 19:49:38.663795+07	3	SamSung Note	1	[{"added": {}}]	7	1
117	2018-12-03 19:50:05.489111+07	2	SamSung Galaxy	2	[{"changed": {"fields": ["categoryName"]}}]	7	1
118	2018-12-03 19:50:21.652448+07	3	SamSung Note	3		7	1
119	2018-12-03 19:50:30.831416+07	4	Xiaomi	1	[{"added": {}}]	7	1
120	2018-12-03 19:50:59.386626+07	4	Xiaomi Mi	2	[{"changed": {"fields": ["categoryName"]}}]	7	1
121	2018-12-03 19:51:14.549091+07	5	Xiaomi Redmi	1	[{"added": {}}]	7	1
122	2018-12-03 19:51:30.685325+07	6	oppo	1	[{"added": {}}]	7	1
123	2018-12-03 19:51:56.93558+07	7	Asus	1	[{"added": {}}]	7	1
124	2018-12-03 19:52:18.074737+07	8	Huewei	1	[{"added": {}}]	7	1
125	2018-12-03 19:57:58.054025+07	2	SamSung	1	[{"added": {}}]	11	1
127	2018-12-03 19:59:56.490688+07	2	Samsung Galaxy Note 9	1	[{"added": {}}]	16	1
128	2018-12-03 20:05:58.148817+07	1	iPhone XS Max feature	2	[]	13	1
129	2018-12-03 20:19:12.227389+07	2	VN/SS	1	[{"added": {}}]	12	1
130	2018-12-03 21:42:48.882667+07	1	Liên quân,mượt; alpha 8,chơi mượt feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
131	2018-12-03 21:43:11.932238+07	7	iPhone XS Max - 64 GB - Xám, Xám bạc, Bạc	2	[]	14	1
132	2018-12-03 22:29:08.877848+07	1	SamSung Galaxy Note 9 / SamSung Galaxy S9 feature	2	[{"changed": {"fields": ["music", "videoCall", "featureTimeUsing", "phoneCategoryType"]}}]	13	1
133	2018-12-03 22:29:51.503398+07	1	Iphone X / Iphone XS Max feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
134	2018-12-03 22:30:49.490972+07	6	SamSung Galaxy Note 9 / SamSung Galaxy S9+ feature	1	[{"added": {}}]	13	1
135	2018-12-03 22:37:32.100131+07	3	Tiếng Hàn	1	[{"added": {}}]	10	1
136	2018-12-03 22:37:39.750275+07	9	Samsung Galaxy Note 9 - 128 GB - Xanh Dương	1	[{"added": {}}]	14	1
137	2018-12-03 22:38:11.798014+07	10	Samsung Galaxy Note 9 - 128 GB - Đen	1	[{"added": {}}]	14	1
138	2018-12-03 22:38:23.188148+07	11	Samsung Galaxy Note 9 - 128 GB - Đồng	1	[{"added": {}}]	14	1
139	2018-12-03 22:40:32.800716+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
140	2018-12-03 22:46:50.103336+07	2	Bảo hành điện thoại Iphone XS Max	1	[{"added": {}}]	8	1
141	2018-12-03 22:47:14.166739+07	2	Bảo hành điện thoại Samsung Galaxy Note 9	2	[{"changed": {"fields": ["guaranteeName"]}}]	8	1
142	2018-12-03 22:51:20.53018+07	4	CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - Samsung Galaxy Note 9 - amount: 22	1	[{"added": {}}]	19	1
143	2018-12-03 22:51:53.562462+07	5	CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - Samsung Galaxy Note 9 - amount: 14	1	[{"added": {}}]	19	1
144	2018-12-03 22:52:04.228174+07	6	CellphoneS 177 Khánh Hội, P. 3, Q. 4 - Samsung Galaxy Note 9 - amount: 34	1	[{"added": {}}]	19	1
145	2018-12-03 22:52:36.933652+07	7	CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - Samsung Galaxy Note 9 - amount: 25	1	[{"added": {}}]	19	1
146	2018-12-03 22:52:50.995749+07	8	CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - Samsung Galaxy Note 9 - amount: 17	1	[{"added": {}}]	19	1
147	2018-12-03 22:53:42.413089+07	9	CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - Samsung Galaxy Note 9 - amount: 27	1	[{"added": {}}]	19	1
148	2018-12-03 22:53:57.570029+07	10	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - Samsung Galaxy Note 9 - amount: 27	1	[{"added": {}}]	19	1
149	2018-12-03 22:58:02.968768+07	11	CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - Samsung Galaxy Note 9 - amount: 27	1	[{"added": {}}]	19	1
150	2018-12-03 22:58:52.949158+07	12	278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - Samsung Galaxy Note 9 - amount: 27	1	[{"added": {}}]	19	1
151	2018-12-03 22:59:02.813874+07	13	CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - Samsung Galaxy Note 9 - amount: 34	1	[{"added": {}}]	19	1
152	2018-12-03 22:59:09.258781+07	14	CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - Samsung Galaxy Note 9 - amount: 12	1	[{"added": {}}]	19	1
153	2018-12-03 22:59:18.833382+07	15	CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - Samsung Galaxy Note 9 - amount: 15	1	[{"added": {}}]	19	1
154	2018-12-03 22:59:31.286045+07	16	CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - Samsung Galaxy Note 9 - amount: 15	1	[{"added": {}}]	19	1
155	2018-12-03 22:59:38.711872+07	17	CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - Samsung Galaxy Note 9 - amount: 16	1	[{"added": {}}]	19	1
156	2018-12-03 22:59:47.165565+07	18	CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - Samsung Galaxy Note 9 - amount: 12	1	[{"added": {}}]	19	1
157	2018-12-03 23:03:28.73422+07	3	Apple iPhone X 64GB	1	[{"added": {}}]	15	1
158	2018-12-03 23:03:33.997286+07	3	Iphone X	1	[{"added": {}}]	16	1
159	2018-12-03 23:08:22.847363+07	9	Samsung Galaxy Note 9 - 128 GB - Xanh Dương	2	[{"changed": {"fields": ["phoneInfoType"]}}]	14	1
160	2018-12-03 23:08:32.187651+07	10	Samsung Galaxy Note 9 - 128 GB - Đen	2	[{"changed": {"fields": ["phoneInfoType"]}}]	14	1
161	2018-12-03 23:08:39.20738+07	11	Samsung Galaxy Note 9 - 128 GB - Đồng	2	[{"changed": {"fields": ["phoneInfoType"]}}]	14	1
162	2018-12-03 23:10:15.384987+07	12	Iphone X - 64 GB - Bạc, Xám	1	[{"added": {}}]	14	1
163	2018-12-03 23:12:07.104467+07	3	Bảo hành điện thoại Iphone X	1	[{"added": {}}]	8	1
164	2018-12-03 23:12:21.641179+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
165	2018-12-03 23:15:33.859224+07	2	Giảm giá bao ốp da khi mua điện thoại Iphone X - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
166	2018-12-03 23:16:05.298078+07	19	Iphone X - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 12	1	[{"added": {}}]	19	1
167	2018-12-03 23:16:21.151924+07	20	Iphone X - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 12	1	[{"added": {}}]	19	1
168	2018-12-03 23:16:25.185963+07	21	Iphone X - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 12	1	[{"added": {}}]	19	1
169	2018-12-03 23:16:30.15517+07	22	Iphone X - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 12	1	[{"added": {}}]	19	1
170	2018-12-03 23:16:51.056901+07	23	Iphone X - CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - amount: 12	1	[{"added": {}}]	19	1
171	2018-12-03 23:16:58.67031+07	24	Iphone X - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 12	1	[{"added": {}}]	19	1
172	2018-12-03 23:17:31.723127+07	25	Iphone X - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - amount: 12	1	[{"added": {}}]	19	1
173	2018-12-03 23:17:49.284993+07	26	Iphone X - CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - amount: 12	1	[{"added": {}}]	19	1
174	2018-12-03 23:17:57.957047+07	27	Iphone X - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 12	1	[{"added": {}}]	19	1
175	2018-12-03 23:18:03.63082+07	28	Iphone X - CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - amount: 12	1	[{"added": {}}]	19	1
176	2018-12-03 23:18:14.765881+07	29	Iphone X - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 12	1	[{"added": {}}]	19	1
177	2018-12-03 23:20:09.172852+07	30	Iphone X - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 20	1	[{"added": {}}]	19	1
178	2018-12-03 23:20:19.079261+07	31	Iphone X - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 92	1	[{"added": {}}]	19	1
179	2018-12-03 23:20:31.675644+07	32	Iphone X - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 2	1	[{"added": {}}]	19	1
180	2018-12-03 23:20:40.055241+07	33	Iphone X - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 72	1	[{"added": {}}]	19	1
181	2018-12-03 23:22:35.942628+07	4	Apple iPhone 8 Plus 64GB	1	[{"added": {}}]	15	1
182	2018-12-03 23:23:03.034851+07	4	Apple iPhone 8 Plus 64GB	1	[{"added": {}}]	16	1
183	2018-12-03 23:32:50.136482+07	7	Iphone 8 / Iphone 8 Plus feature	1	[{"added": {}}]	13	1
184	2018-12-03 23:33:54.420434+07	13	Apple iPhone 8 Plus 64GB - 64 GB - Bạc, Xám	1	[{"added": {}}]	14	1
185	2018-12-03 23:34:26.997228+07	14	Apple iPhone 8 Plus 64GB - 64 GB - Vàng	1	[{"added": {}}]	14	1
186	2018-12-03 23:34:36.47096+07	15	Apple iPhone 8 Plus 64GB - 64 GB - Đỏ	1	[{"added": {}}]	14	1
187	2018-12-03 23:35:08.97401+07	4	Bảo hành điện thoại Iphone 8 plus	1	[{"added": {}}]	8	1
188	2018-12-03 23:35:18.352957+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
189	2018-12-03 23:35:38.467115+07	3	Giảm giá bao ốp da khi mua điện thoại Iphone 8 Plus - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
190	2018-12-03 23:36:21.003958+07	34	Apple iPhone 8 Plus 64GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 66	1	[{"added": {}}]	19	1
191	2018-12-03 23:36:35.905317+07	35	Apple iPhone 8 Plus 64GB - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 93	1	[{"added": {}}]	19	1
192	2018-12-03 23:36:52.073804+07	36	Apple iPhone 8 Plus 64GB - CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - amount: 60	1	[{"added": {}}]	19	1
193	2018-12-03 23:36:58.020219+07	37	Apple iPhone 8 Plus 64GB - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 78	1	[{"added": {}}]	19	1
194	2018-12-03 23:37:29.296056+07	38	Apple iPhone 8 Plus 64GB - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 90	1	[{"added": {}}]	19	1
195	2018-12-03 23:37:36.28576+07	39	Apple iPhone 8 Plus 64GB - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 87	1	[{"added": {}}]	19	1
196	2018-12-03 23:37:45.723596+07	40	Apple iPhone 8 Plus 64GB - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 54	1	[{"added": {}}]	19	1
197	2018-12-03 23:37:51.660362+07	41	Apple iPhone 8 Plus 64GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 41	1	[{"added": {}}]	19	1
198	2018-12-03 23:39:07.36624+07	5	Apple iPhone 8 64GB	1	[{"added": {}}]	15	1
199	2018-12-03 23:39:10.949858+07	5	Apple iPhone 8 64GB	1	[{"added": {}}]	16	1
200	2018-12-03 23:41:14.170706+07	16	Apple iPhone 8 64GB - 64 GB - Vàng, Xám, Đỏ	1	[{"added": {}}]	14	1
201	2018-12-03 23:42:04.301841+07	5	Bảo hành điện thoại Iphone 8	1	[{"added": {}}]	8	1
202	2018-12-03 23:42:11.276005+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
203	2018-12-03 23:42:22.34284+07	4	Giảm giá bao ốp da khi mua điện thoại Iphone 8 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
204	2018-12-03 23:42:46.679544+07	42	Apple iPhone 8 64GB - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 32	1	[{"added": {}}]	19	1
205	2018-12-03 23:43:04.803858+07	43	Apple iPhone 8 64GB - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 23	1	[{"added": {}}]	19	1
206	2018-12-03 23:43:10.395192+07	44	Apple iPhone 8 64GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 25	1	[{"added": {}}]	19	1
207	2018-12-03 23:44:59.584621+07	6	Apple iPhone 7 Plus 128GB (Certified Pre-Owned)	1	[{"added": {}}]	15	1
208	2018-12-03 23:45:01.993991+07	6	Apple iPhone 7 Plus 128GB (Certified Pre-Owned)	1	[{"added": {}}]	16	1
209	2018-12-03 23:48:12.810883+07	8	Iphone 7 / Iphone 7 Plus feature	1	[{"added": {}}]	13	1
210	2018-12-03 23:49:34.004331+07	16	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - 128 GB - Vàng, Hồng	2	[{"changed": {"fields": ["phoneProductId", "color", "price1", "price2", "phone4G", "width", "height", "weight", "resolution", "chipset", "RAM", "ROM", "bluetooth", "Pin", "version", "phoneFeature", "status"]}}]	14	1
211	2018-12-03 23:50:18.107488+07	6	Bảo hành điện thoại Iphone 7 (Certified Pre-Owned)	1	[{"added": {}}]	8	1
212	2018-12-03 23:50:27.855901+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
213	2018-12-03 23:50:40.255136+07	5	Giảm giá bao ốp da khi mua điện thoại Iphone 7 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
214	2018-12-03 23:51:05.231335+07	45	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 71	1	[{"added": {}}]	19	1
215	2018-12-03 23:51:57.745688+07	46	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 10	1	[{"added": {}}]	19	1
216	2018-12-03 23:52:25.240161+07	47	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 8	1	[{"added": {}}]	19	1
217	2018-12-03 23:52:32.312061+07	48	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 2	1	[{"added": {}}]	19	1
218	2018-12-03 23:52:38.048525+07	49	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 33	1	[{"added": {}}]	19	1
219	2018-12-03 23:52:44.088143+07	50	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 8	1	[{"added": {}}]	19	1
220	2018-12-03 23:52:51.906589+07	51	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 18	1	[{"added": {}}]	19	1
221	2018-12-03 23:52:57.677061+07	52	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 7	1	[{"added": {}}]	19	1
222	2018-12-03 23:53:06.120533+07	53	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 25	1	[{"added": {}}]	19	1
223	2018-12-03 23:53:12.387858+07	54	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 51	1	[{"added": {}}]	19	1
224	2018-12-03 23:53:19.817392+07	55	Apple iPhone 7 Plus 128GB (Certified Pre-Owned) - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 85	1	[{"added": {}}]	19	1
225	2018-12-04 00:02:56.262518+07	23	Hồ Chí Minh - CellphoneS 1075B Hậu Giang, P. 11, Q. 6	1	[{"added": {}}]	18	1
226	2018-12-04 00:03:32.540154+07	24	Hồ Chí Minh - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9	1	[{"added": {}}]	18	1
227	2018-12-04 00:05:01.625775+07	25	Hồ Chí Minh - CellphoneS 288 Đường 3/2, P. 12, Q. 10	1	[{"added": {}}]	18	1
228	2018-12-04 00:05:48.927356+07	26	Hồ Chí Minh - CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức	1	[{"added": {}}]	18	1
229	2018-12-04 00:06:33.093157+07	27	Hồ Chí Minh - CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp	1	[{"added": {}}]	18	1
230	2018-12-04 00:07:30.151639+07	28	Hồ Chí Minh - CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh	1	[{"added": {}}]	18	1
231	2018-12-04 00:08:10.707581+07	29	Hồ Chí Minh - CellphoneS 55B Trần Quang Khải, P. Tân Định, Q. 1	1	[{"added": {}}]	18	1
232	2018-12-04 00:08:51.276898+07	30	Hồ Chí Minh - CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây	1	[{"added": {}}]	18	1
233	2018-12-04 00:09:17.163955+07	31	Hồ Chí Minh - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp	1	[{"added": {}}]	18	1
234	2018-12-04 00:10:01.047986+07	32	Hồ Chí Minh - CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh	1	[{"added": {}}]	18	1
235	2018-12-04 00:11:45.023797+07	7	Apple iPhone 6S 64GB cũ (99%)	1	[{"added": {}}]	15	1
236	2018-12-04 00:11:48.095019+07	7	Apple iPhone 6S 64GB cũ (99%)	1	[{"added": {}}]	16	1
237	2018-12-04 00:14:08.775492+07	8	Iphone 7 / Iphone 7 Plus feature	2	[]	13	1
238	2018-12-04 00:15:07.062613+07	9	Iphone 6 / Iphone 6 Plus feature	1	[{"added": {}}]	13	1
239	2018-12-04 00:15:10.74498+07	17	Apple iPhone 6S 64GB cũ (99%) - 64 GB - Vàng	1	[{"added": {}}]	14	1
240	2018-12-04 00:15:30.333591+07	18	Apple iPhone 6S 64GB cũ (99%) - 64 GB - Hồng, Xám	1	[{"added": {}}]	14	1
241	2018-12-04 00:15:51.965934+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
242	2018-12-04 00:16:24.599325+07	6	Giảm giá bao ốp da khi mua điện thoại Iphone 6S 64GB cũ (99%) - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
243	2018-12-04 00:16:34.647463+07	5	Giảm giá bao ốp da khi mua điện thoại Iphone 7 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	2	[{"changed": {"fields": ["productId"]}}]	17	1
244	2018-12-04 00:16:41.020765+07	3	Giảm giá bao ốp da khi mua điện thoại Iphone 8 Plus - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	2	[]	17	1
245	2018-12-04 00:16:46.214284+07	4	Giảm giá bao ốp da khi mua điện thoại Iphone 8 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	2	[{"changed": {"fields": ["productId"]}}]	17	1
246	2018-12-04 00:16:50.473675+07	2	Giảm giá bao ốp da khi mua điện thoại Iphone X - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	2	[]	17	1
247	2018-12-04 00:16:54.462318+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2018-11-30 	2	[]	17	1
248	2018-12-04 00:17:39.3174+07	56	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 28	1	[{"added": {}}]	19	1
249	2018-12-04 00:17:45.404538+07	57	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 7	1	[{"added": {}}]	19	1
250	2018-12-04 00:18:02.156701+07	58	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 91	1	[{"added": {}}]	19	1
251	2018-12-04 00:18:07.544996+07	59	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 76	1	[{"added": {}}]	19	1
252	2018-12-04 00:18:15.162851+07	60	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 87	1	[{"added": {}}]	19	1
253	2018-12-04 00:18:35.957887+07	61	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 17	1	[{"added": {}}]	19	1
254	2018-12-04 00:19:03.435299+07	62	Apple iPhone 6S 64GB cũ (99%) - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 96	1	[{"added": {}}]	19	1
255	2018-12-04 00:19:08.447289+07	63	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 22	1	[{"added": {}}]	19	1
256	2018-12-04 00:19:14.046248+07	64	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 61	1	[{"added": {}}]	19	1
257	2018-12-04 00:19:19.691329+07	65	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 21	1	[{"added": {}}]	19	1
258	2018-12-04 00:19:25.588061+07	66	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 97	1	[{"added": {}}]	19	1
259	2018-12-04 00:19:29.919835+07	67	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 26	1	[{"added": {}}]	19	1
260	2018-12-04 00:19:36.559335+07	68	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 59	1	[{"added": {}}]	19	1
261	2018-12-04 00:19:41.811974+07	69	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 26	1	[{"added": {}}]	19	1
262	2018-12-04 00:19:48.328683+07	70	Apple iPhone 6S 64GB cũ (99%) - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 32	1	[{"added": {}}]	19	1
263	2018-12-04 00:22:28.71903+07	8	Samsung Galaxy A9 (2018) Chính Hãng	1	[{"added": {}}]	15	1
264	2018-12-04 00:22:33.987027+07	8	Samsung Galaxy A9	1	[{"added": {}}]	16	1
265	2018-12-04 00:28:04.188674+07	10	Samsung galaxy A9 feature	1	[{"added": {}}]	13	1
266	2018-12-04 00:32:27.994443+07	20	Samsung Galaxy A9 - 128 GB - Hồng, Xanh dương, Đen	1	[{"added": {}}]	14	1
267	2018-12-04 00:35:36.605711+07	7	Bảo hành điện thoại Samsung Galaxy A9	1	[{"added": {}}]	8	1
268	2018-12-04 00:35:43.69234+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
269	2018-12-04 00:37:55.937395+07	7	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9 - discount:0.0 - duration: 2018-11-12 - 2018-12-31 	1	[{"added": {}}]	17	1
270	2018-12-04 00:38:38.91032+07	8	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9 - discount:0.0 - duration: 2018-11-12 - 2018-12-09 	1	[{"added": {}}]	17	1
271	2018-12-04 00:39:08.240711+07	8	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9 - discount:0.0 - duration: 2018-11-12 - 2019-04-20 	2	[{"changed": {"fields": ["dateEnd", "other"]}}]	17	1
272	2018-12-04 00:39:40.988414+07	71	Samsung Galaxy A9 - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 8	1	[{"added": {}}]	19	1
273	2018-12-04 00:39:46.584357+07	72	Samsung Galaxy A9 - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 74	1	[{"added": {}}]	19	1
274	2018-12-04 00:39:52.158729+07	73	Samsung Galaxy A9 - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 46	1	[{"added": {}}]	19	1
275	2018-12-04 00:39:58.3467+07	74	Samsung Galaxy A9 - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 73	1	[{"added": {}}]	19	1
276	2018-12-04 00:40:04.268168+07	75	Samsung Galaxy A9 - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 55	1	[{"added": {}}]	19	1
277	2018-12-04 00:40:09.922847+07	76	Samsung Galaxy A9 - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 92	1	[{"added": {}}]	19	1
278	2018-12-04 00:40:16.715901+07	77	Samsung Galaxy A9 - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 78	1	[{"added": {}}]	19	1
279	2018-12-04 00:40:24.044816+07	78	Samsung Galaxy A9 - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 38	1	[{"added": {}}]	19	1
280	2018-12-04 00:40:39.560827+07	79	Samsung Galaxy A9 - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 21	1	[{"added": {}}]	19	1
281	2018-12-04 00:40:46.809064+07	80	Samsung Galaxy A9 - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 92	1	[{"added": {}}]	19	1
282	2018-12-04 00:41:16.654743+07	81	Samsung Galaxy A9 - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 85	1	[{"added": {}}]	19	1
283	2018-12-04 00:41:24.638694+07	82	Samsung Galaxy A9 - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 53	1	[{"added": {}}]	19	1
284	2018-12-04 00:41:33.535157+07	83	Samsung Galaxy A9 - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 46	1	[{"added": {}}]	19	1
285	2018-12-04 00:41:39.323121+07	84	Samsung Galaxy A9 - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 45	1	[{"added": {}}]	19	1
286	2018-12-04 00:41:44.324996+07	85	Samsung Galaxy A9 - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 35	1	[{"added": {}}]	19	1
287	2018-12-04 00:41:54.009395+07	86	Samsung Galaxy A9 - CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp - amount: 32	1	[{"added": {}}]	19	1
288	2018-12-04 00:42:05.936341+07	87	Samsung Galaxy A9 - CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - amount: 98	1	[{"added": {}}]	19	1
289	2018-12-04 00:42:12.184644+07	88	Samsung Galaxy A9 - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 7	1	[{"added": {}}]	19	1
290	2018-12-04 00:42:21.667043+07	89	Samsung Galaxy A9 - CellphoneS 536 Xô Viết Nghệ Tĩnh, P. 25, Q. Bình Thạnh - amount: 85	1	[{"added": {}}]	19	1
291	2018-12-04 00:42:28.26687+07	90	Samsung Galaxy A9 - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - amount: 37	1	[{"added": {}}]	19	1
292	2018-12-04 00:42:57.145277+07	91	Samsung Galaxy A9 - CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức - amount: 19	1	[{"added": {}}]	19	1
293	2018-12-04 00:43:11.234515+07	92	Samsung Galaxy A9 - CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh - amount: 31	1	[{"added": {}}]	19	1
294	2018-12-04 00:43:20.16268+07	93	Samsung Galaxy A9 - CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - amount: 69	1	[{"added": {}}]	19	1
295	2018-12-04 00:43:30.600164+07	94	Samsung Galaxy A9 - CellphoneS 56/2b Nguyễn Ảnh Thủ, Phường Trung Mỹ Tây, Quận 12, Trung Mỹ Tây - amount: 41	1	[{"added": {}}]	19	1
296	2018-12-04 00:43:43.224954+07	95	Samsung Galaxy A9 - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 29	1	[{"added": {}}]	19	1
297	2018-12-04 00:43:54.777677+07	96	Samsung Galaxy A9 - CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - amount: 19	1	[{"added": {}}]	19	1
298	2018-12-04 00:44:18.592686+07	97	Samsung Galaxy A9 - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 100	1	[{"added": {}}]	19	1
299	2018-12-04 00:45:35.310973+07	9	Samsung Galaxy A7 (2018) Chính hãng	1	[{"added": {}}]	15	1
300	2018-12-04 00:45:37.424718+07	9	Samsung Galaxy A7	1	[{"added": {}}]	16	1
301	2018-12-04 00:48:23.046306+07	10	Samsung galaxy A9 | A7 feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
302	2018-12-04 00:49:07.015697+07	21	Samsung Galaxy A7 - 64 GB - Vàng, Xanh dương, Đen	1	[{"added": {}}]	14	1
303	2018-12-04 00:49:21.08038+07	8	Bảo hành điện thoại Samsung Galaxy A7	1	[{"added": {}}]	8	1
304	2018-12-04 00:49:27.168157+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
305	2018-12-04 00:50:24.671452+07	9	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A7 - discount:0.5 - duration: 2018-11-12 - 2019-04-20 	1	[{"added": {}}]	17	1
306	2018-12-04 00:50:52.795265+07	98	Samsung Galaxy A7 - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 100	1	[{"added": {}}]	19	1
307	2018-12-04 00:51:41.217479+07	99	Samsung Galaxy A7 - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 41	1	[{"added": {}}]	19	1
308	2018-12-04 00:51:52.512005+07	100	Samsung Galaxy A7 - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 12	1	[{"added": {}}]	19	1
309	2018-12-04 00:52:04.061854+07	101	Samsung Galaxy A7 - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 2	1	[{"added": {}}]	19	1
310	2018-12-04 00:52:10.403585+07	102	Samsung Galaxy A7 - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 12	1	[{"added": {}}]	19	1
311	2018-12-04 00:52:16.311293+07	103	Samsung Galaxy A7 - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 11	1	[{"added": {}}]	19	1
312	2018-12-04 00:52:23.318041+07	104	Samsung Galaxy A7 - CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp - amount: 12	1	[{"added": {}}]	19	1
313	2018-12-04 00:52:30.211025+07	105	Samsung Galaxy A7 - CellphoneS 363 Võ Văn Tần, P. 5, Q. 3 - amount: 1	1	[{"added": {}}]	19	1
314	2018-12-04 00:52:36.942092+07	106	Samsung Galaxy A7 - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 10	1	[{"added": {}}]	19	1
315	2018-12-04 00:53:05.881911+07	107	Samsung Galaxy A7 - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 10	1	[{"added": {}}]	19	1
316	2018-12-04 00:53:26.138546+07	108	Samsung Galaxy A7 - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 10	1	[{"added": {}}]	19	1
317	2018-12-04 00:53:37.760751+07	109	Samsung Galaxy A7 - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 12	1	[{"added": {}}]	19	1
318	2018-12-04 00:53:43.403549+07	110	Samsung Galaxy A7 - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 6	1	[{"added": {}}]	19	1
319	2018-12-04 00:53:49.2244+07	111	Samsung Galaxy A7 - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 11	1	[{"added": {}}]	19	1
320	2018-12-04 00:53:54.667992+07	112	Samsung Galaxy A7 - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 14	1	[{"added": {}}]	19	1
321	2018-12-04 00:55:33.400945+07	10	Samsung Galaxy J6 Plus Chính Hãng	1	[{"added": {}}]	15	1
322	2018-12-04 00:55:36.832144+07	10	Samsung Galaxy J6 Plus	1	[{"added": {}}]	16	1
323	2018-12-04 00:59:01.699376+07	11	Samsung galaxy J6 Plus | J6 feature	1	[{"added": {}}]	13	1
324	2018-12-04 00:59:17.716976+07	3	VN\\SSJ	1	[{"added": {}}]	12	1
325	2018-12-04 00:59:41.792545+07	22	Samsung Galaxy J6 Plus - 32 GB - Xám, Đen, Đỏ	1	[{"added": {}}]	14	1
326	2018-12-04 00:59:58.889383+07	9	Bảo hành điện thoại Samsung Galaxy J6 Plus	1	[{"added": {}}]	8	1
327	2018-12-04 01:00:08.48559+07	2	FE CREDIT	1	[{"added": {}}]	9	1
328	2018-12-04 01:00:25.05199+07	2	FE CREDIT	3		9	1
329	2018-12-04 01:00:29.31919+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
330	2018-12-04 01:00:59.682428+07	10	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy J6 Plus - discount:0.3 - duration: 2018-11-12 - 2019-04-20 	1	[{"added": {}}]	17	1
331	2018-12-04 01:01:20.742805+07	113	Samsung Galaxy J6 Plus - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 13	1	[{"added": {}}]	19	1
332	2018-12-04 01:01:28.017099+07	114	Samsung Galaxy J6 Plus - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 11	1	[{"added": {}}]	19	1
333	2018-12-04 01:01:37.485063+07	115	Samsung Galaxy J6 Plus - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 8	1	[{"added": {}}]	19	1
334	2018-12-04 01:01:45.137342+07	116	Samsung Galaxy J6 Plus - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 7	1	[{"added": {}}]	19	1
335	2018-12-04 01:02:00.241435+07	117	Samsung Galaxy J6 Plus - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 15	1	[{"added": {}}]	19	1
336	2018-12-04 01:02:09.497409+07	118	Samsung Galaxy J6 Plus - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 15	1	[{"added": {}}]	19	1
337	2018-12-04 01:02:17.072047+07	119	Samsung Galaxy J6 Plus - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 6	1	[{"added": {}}]	19	1
338	2018-12-04 01:02:27.465112+07	120	Samsung Galaxy J6 Plus - CellphoneS 136 Nguyễn Thái Học, P. Phạm Ngũ Lão, Q. 1 - amount: 2	1	[{"added": {}}]	19	1
339	2018-12-04 01:02:36.421568+07	121	Samsung Galaxy J6 Plus - CellPhoneS 114 Phan Đăng Lưu, phường 3, Phú Nhuận - amount: 2	1	[{"added": {}}]	19	1
340	2018-12-04 01:02:51.715293+07	122	Samsung Galaxy J6 Plus - CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - amount: 10	1	[{"added": {}}]	19	1
341	2018-12-04 01:03:12.795185+07	123	Samsung Galaxy J6 Plus - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 7	1	[{"added": {}}]	19	1
342	2018-12-04 01:05:01.985527+07	11	Samsung Galaxy S8+ Chính hãng	1	[{"added": {}}]	15	1
343	2018-12-04 01:05:04.255191+07	11	Samsung Galaxy S8+	1	[{"added": {}}]	16	1
344	2018-12-04 01:08:43.335365+07	12	Samsung galaxy S8+ | S8 feature	1	[{"added": {}}]	13	1
345	2018-12-04 01:09:04.035034+07	4	VN\\SS+	1	[{"added": {}}]	12	1
346	2018-12-04 01:09:38.180215+07	23	Samsung Galaxy S8+ - 64 GB - Tím, Đen	1	[{"added": {}}]	14	1
347	2018-12-04 01:09:58.068203+07	10	Bảo hành điện thoại Samsung Galaxy S8+	1	[{"added": {}}]	8	1
348	2018-12-04 01:10:04.643042+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
349	2018-12-04 01:10:34.134023+07	11	Giảm giá bao ốp da khi mua điện thoại Galaxy S8+ - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
350	2018-12-04 01:10:48.676496+07	124	Samsung Galaxy S8+ - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 11	1	[{"added": {}}]	19	1
351	2018-12-04 01:11:04.10597+07	125	Samsung Galaxy S8+ - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 7	1	[{"added": {}}]	19	1
352	2018-12-04 01:11:09.763297+07	126	Samsung Galaxy S8+ - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 5	1	[{"added": {}}]	19	1
353	2018-12-04 01:11:18.025825+07	127	Samsung Galaxy S8+ - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - amount: 10	1	[{"added": {}}]	19	1
354	2018-12-04 01:11:25.165101+07	128	Samsung Galaxy S8+ - CellphoneS 1075B Hậu Giang, P. 11, Q. 6 - amount: 11	1	[{"added": {}}]	19	1
355	2018-12-04 01:11:57.720929+07	129	Samsung Galaxy S8+ - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 10	1	[{"added": {}}]	19	1
356	2018-12-04 01:12:02.742372+07	130	Samsung Galaxy S8+ - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 8	1	[{"added": {}}]	19	1
357	2018-12-04 01:12:08.40438+07	131	Samsung Galaxy S8+ - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 8	1	[{"added": {}}]	19	1
358	2018-12-04 01:12:14.636312+07	132	Samsung Galaxy S8+ - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 9	1	[{"added": {}}]	19	1
359	2018-12-04 01:12:22.511823+07	133	Samsung Galaxy S8+ - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 10	1	[{"added": {}}]	19	1
360	2018-12-04 01:14:10.091644+07	12	Samsung Galaxy S9+ (Plus) 64GB Chính hãng	1	[{"added": {}}]	15	1
361	2018-12-04 01:14:14.072987+07	12	Samsung Galaxy S9+	1	[{"added": {}}]	16	1
362	2018-12-04 01:16:19.978604+07	12	Samsung galaxy S8+ | S8 | S9+ | S9 feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
363	2018-12-04 01:16:27.726962+07	24	Samsung Galaxy S9+ - 64 GB - Tím, Xanh dương, Đen	1	[{"added": {}}]	14	1
364	2018-12-04 01:16:41.253647+07	11	Bảo hành điện thoại Samsung Galaxy S9+	1	[{"added": {}}]	8	1
365	2018-12-04 01:16:47.598994+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
366	2018-12-04 01:17:09.266004+07	12	Giảm giá bao ốp da khi mua điện thoại Galaxy S9+ - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
367	2018-12-04 01:17:19.803658+07	12	Giảm giá bao ốp da khi mua điện thoại Galaxy S9+ - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	2	[{"changed": {"fields": ["productId"]}}]	17	1
368	2018-12-04 01:19:03.232005+07	134	Samsung Galaxy S9+ - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 5	1	[{"added": {}}]	19	1
369	2018-12-04 01:19:08.7394+07	135	Samsung Galaxy S9+ - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 8	1	[{"added": {}}]	19	1
370	2018-12-04 01:19:14.130987+07	136	Samsung Galaxy S9+ - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 7	1	[{"added": {}}]	19	1
371	2018-12-04 01:19:22.030221+07	137	Samsung Galaxy S9+ - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 7	1	[{"added": {}}]	19	1
372	2018-12-04 01:19:27.012699+07	138	Samsung Galaxy S9+ - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 11	1	[{"added": {}}]	19	1
373	2018-12-04 01:19:41.435316+07	139	Samsung Galaxy S9+ - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 3	1	[{"added": {}}]	19	1
374	2018-12-04 01:19:47.744702+07	140	Samsung Galaxy S9+ - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 2	1	[{"added": {}}]	19	1
375	2018-12-04 01:19:53.500945+07	141	Samsung Galaxy S9+ - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - amount: 2	1	[{"added": {}}]	19	1
376	2018-12-04 01:19:59.445958+07	142	Samsung Galaxy S9+ - CellphoneS A23/8, Quốc lộ 50 (Đối diện Đường số 10, gần nhà thờ Bình Hưng), H. Bình Chánh - amount: 2	1	[{"added": {}}]	19	1
377	2018-12-04 01:20:08.698509+07	143	Samsung Galaxy S9+ - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 3	1	[{"added": {}}]	19	1
378	2018-12-04 01:22:35.518287+07	13	Samsung Galaxy S8 Chính hãng cũ (99%)	1	[{"added": {}}]	15	1
379	2018-12-04 01:22:37.737931+07	13	Samsung Galaxy S8 cũ	1	[{"added": {}}]	16	1
380	2018-12-04 01:24:42.31159+07	25	Samsung Galaxy S8 cũ - 64 GB - Vàng	1	[{"added": {}}]	14	1
381	2018-12-04 01:25:00.538246+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
382	2018-12-04 01:25:37.865039+07	13	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy S8 cũ - discount:0.0 - duration: 2018-11-12 - 2018-12-31 	1	[{"added": {}}]	17	1
383	2018-12-04 01:28:21.982707+07	3	Xiaomi	1	[{"added": {}}]	11	1
384	2018-12-04 01:28:48.377298+07	14	Xiaomi Redmi S2 64GB Chính hãng (Redmi Y2)	1	[{"added": {}}]	15	1
385	2018-12-04 01:28:50.280305+07	14	Xiaomi Redmi S2 64GB	1	[{"added": {}}]	16	1
386	2018-12-04 01:32:44.205513+07	13	Samsung Redmi S2 feature	1	[{"added": {}}]	13	1
387	2018-12-04 01:33:14.640739+07	5	VN\\XIAOMIR	1	[{"added": {}}]	12	1
388	2018-12-04 01:33:27.166739+07	3	VN/SSJ	2	[{"changed": {"fields": ["code"]}}]	12	1
389	2018-12-04 01:33:36.44149+07	4	VN/SS+	2	[{"changed": {"fields": ["code"]}}]	12	1
390	2018-12-04 01:33:42.708343+07	5	VN/XIAOMIR	2	[{"changed": {"fields": ["code"]}}]	12	1
391	2018-12-04 01:34:28.506654+07	26	Xiaomi Redmi S2 64GB - 64 GB - Vàng, Xám	1	[{"added": {}}]	14	1
392	2018-12-04 01:34:51.327996+07	12	Bảo hành điện thoại Redmi S2	1	[{"added": {}}]	8	1
393	2018-12-04 01:34:57.355107+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
394	2018-12-04 01:35:47.944475+07	14	Giảm giá bao ốp da khi mua điện thoại Redmi S2 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
395	2018-12-04 01:36:16.945195+07	144	Xiaomi Redmi S2 64GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 10	1	[{"added": {}}]	19	1
396	2018-12-04 01:36:25.069137+07	145	Xiaomi Redmi S2 64GB - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 11	1	[{"added": {}}]	19	1
397	2018-12-04 01:36:31.23282+07	146	Xiaomi Redmi S2 64GB - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 8	1	[{"added": {}}]	19	1
398	2018-12-04 01:36:42.043452+07	147	Xiaomi Redmi S2 64GB - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 14	1	[{"added": {}}]	19	1
399	2018-12-04 01:36:48.372738+07	148	Xiaomi Redmi S2 64GB - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 6	1	[{"added": {}}]	19	1
400	2018-12-04 01:36:55.209846+07	149	Xiaomi Redmi S2 64GB - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 2	1	[{"added": {}}]	19	1
401	2018-12-04 01:37:03.644357+07	150	Xiaomi Redmi S2 64GB - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 3	1	[{"added": {}}]	19	1
402	2018-12-04 01:37:09.969768+07	151	Xiaomi Redmi S2 64GB - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 7	1	[{"added": {}}]	19	1
403	2018-12-04 01:37:34.466548+07	152	Xiaomi Redmi S2 64GB - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 2	1	[{"added": {}}]	19	1
404	2018-12-04 01:37:39.403965+07	153	Xiaomi Redmi S2 64GB - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 2	1	[{"added": {}}]	19	1
405	2018-12-04 01:37:44.66505+07	154	Xiaomi Redmi S2 64GB - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 8	1	[{"added": {}}]	19	1
406	2018-12-04 01:37:52.466034+07	155	Xiaomi Redmi S2 64GB - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 11	1	[{"added": {}}]	19	1
407	2018-12-04 01:37:57.678121+07	156	Xiaomi Redmi S2 64GB - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 5	1	[{"added": {}}]	19	1
408	2018-12-04 01:38:06.526975+07	157	Xiaomi Redmi S2 64GB - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 10	1	[{"added": {}}]	19	1
409	2018-12-04 01:38:15.896378+07	158	Xiaomi Redmi S2 64GB - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 11	1	[{"added": {}}]	19	1
410	2018-12-04 01:38:23.883182+07	159	Xiaomi Redmi S2 64GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 3	1	[{"added": {}}]	19	1
411	2018-12-04 01:40:00.81755+07	15	Xiaomi Mi 8 Lite 64GB Chính hãng	1	[{"added": {}}]	15	1
412	2018-12-04 01:40:03.237192+07	15	Xiaomi Mi 8 Lite 64GB	1	[{"added": {}}]	16	1
413	2018-12-04 01:42:09.301974+07	4	Tiếng Trung Quốc	1	[{"added": {}}]	10	1
414	2018-12-04 01:42:23.241397+07	13	Samsung Redmi S2 | Mi 8 feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
415	2018-12-04 01:42:39.074843+07	6	VN/XIAOMIM	1	[{"added": {}}]	12	1
416	2018-12-04 01:43:01.211022+07	27	Xiaomi Mi 8 Lite 64GB - 64 GB - Đen	1	[{"added": {}}]	14	1
417	2018-12-04 01:43:15.065811+07	13	Bảo hành điện thoại Xiaomi Mi 8 Lite	1	[{"added": {}}]	8	1
418	2018-12-04 01:43:22.310274+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
419	2018-12-04 01:43:36.143042+07	15	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8 Lite - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
420	2018-12-04 01:43:49.166135+07	160	Xiaomi Mi 8 Lite 64GB - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 4	1	[{"added": {}}]	19	1
421	2018-12-04 01:43:54.377222+07	161	Xiaomi Mi 8 Lite 64GB - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 12	1	[{"added": {}}]	19	1
422	2018-12-04 01:43:59.258366+07	162	Xiaomi Mi 8 Lite 64GB - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 8	1	[{"added": {}}]	19	1
423	2018-12-04 01:44:04.574626+07	163	Xiaomi Mi 8 Lite 64GB - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 13	1	[{"added": {}}]	19	1
424	2018-12-04 01:44:10.274994+07	164	Xiaomi Mi 8 Lite 64GB - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 14	1	[{"added": {}}]	19	1
425	2018-12-04 01:44:15.547532+07	165	Xiaomi Mi 8 Lite 64GB - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 14	1	[{"added": {}}]	19	1
426	2018-12-04 01:44:22.980467+07	166	Xiaomi Mi 8 Lite 64GB - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 3	1	[{"added": {}}]	19	1
427	2018-12-04 01:44:28.707528+07	167	Xiaomi Mi 8 Lite 64GB - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 9	1	[{"added": {}}]	19	1
428	2018-12-04 01:44:37.574555+07	168	Xiaomi Mi 8 Lite 64GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 13	1	[{"added": {}}]	19	1
429	2018-12-04 01:44:59.027085+07	169	Xiaomi Mi 8 Lite 64GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 14	1	[{"added": {}}]	19	1
430	2018-12-04 01:45:05.262946+07	170	Xiaomi Mi 8 Lite 64GB - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 2	1	[{"added": {}}]	19	1
431	2018-12-04 01:45:11.255064+07	171	Xiaomi Mi 8 Lite 64GB - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 3	1	[{"added": {}}]	19	1
432	2018-12-04 01:45:45.542813+07	172	Xiaomi Mi 8 Lite 64GB - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 5	1	[{"added": {}}]	19	1
433	2018-12-04 01:45:52.148352+07	173	Xiaomi Mi 8 Lite 64GB - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 15	1	[{"added": {}}]	19	1
434	2018-12-04 01:47:12.668609+07	16	Xiaomi Mi 8 64GB Chính hãng	1	[{"added": {}}]	15	1
435	2018-12-04 01:47:14.812417+07	16	Xiaomi Mi 8 64GB	1	[{"added": {}}]	16	1
436	2018-12-04 01:49:31.178349+07	13	Samsung Redmi S2 | Mi 8 feature	2	[]	13	1
437	2018-12-04 01:49:36.788849+07	28	Xiaomi Mi 8 64GB - 64 GB - Trắng, Xanh dương, Đen	1	[{"added": {}}]	14	1
438	2018-12-04 01:50:12.979219+07	14	Bảo hành điện thoại Xiaomi Mi 8	1	[{"added": {}}]	8	1
439	2018-12-04 01:50:19.13195+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
440	2018-12-04 01:50:32.055824+07	16	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
441	2018-12-04 01:50:49.351269+07	174	Xiaomi Mi 8 64GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 9	1	[{"added": {}}]	19	1
442	2018-12-04 01:50:55.44594+07	175	Xiaomi Mi 8 64GB - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 5	1	[{"added": {}}]	19	1
443	2018-12-04 01:51:00.600471+07	176	Xiaomi Mi 8 64GB - CellphoneS 37-39 Võ Văn Ngân, P. Linh Chiểu, Q. Thủ Đức - amount: 8	1	[{"added": {}}]	19	1
444	2018-12-04 01:51:12.351832+07	177	Xiaomi Mi 8 64GB - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 12	1	[{"added": {}}]	19	1
445	2018-12-04 01:51:29.366602+07	178	Xiaomi Mi 8 64GB - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 3	1	[{"added": {}}]	19	1
446	2018-12-04 01:51:37.648303+07	179	Xiaomi Mi 8 64GB - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 6	1	[{"added": {}}]	19	1
447	2018-12-04 01:52:58.367949+07	4	ASUS	1	[{"added": {}}]	11	1
448	2018-12-04 01:55:10.149116+07	17	ASUS ZenFone Max Pro M1 32GB Chính hãng	1	[{"added": {}}]	15	1
449	2018-12-04 01:55:17.417829+07	17	ASUS ZenFone Max Pro M1 32GB	1	[{"added": {}}]	16	1
450	2018-12-04 01:59:03.596867+07	14	ASUS ZenFone M1 feature	1	[{"added": {}}]	13	1
451	2018-12-04 01:59:25.404803+07	13	Redmi S2 | Mi 8 feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
452	2018-12-04 01:59:40.126917+07	6	SamSung Galaxy Note 9 feature	2	[{"changed": {"fields": ["phoneCategoryType"]}}]	13	1
453	2018-12-04 01:59:49.16526+07	29	ASUS ZenFone Max Pro M1 32GB - 32 GB - Bạc, Đen	1	[{"added": {}}]	14	1
454	2018-12-04 02:00:10.323768+07	15	Bảo hành điện thoại ASUS ZenFone Max Pro M1	1	[{"added": {}}]	8	1
455	2018-12-04 02:00:21.13761+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
456	2018-12-04 02:00:50.640795+07	17	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
457	2018-12-04 02:01:13.652982+07	180	ASUS ZenFone Max Pro M1 32GB - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 5	1	[{"added": {}}]	19	1
458	2018-12-04 02:01:19.100626+07	181	ASUS ZenFone Max Pro M1 32GB - CellphoneS 117 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 14	1	[{"added": {}}]	19	1
459	2018-12-04 02:01:30.000504+07	182	ASUS ZenFone Max Pro M1 32GB - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 6	1	[{"added": {}}]	19	1
460	2018-12-04 02:01:36.840432+07	183	ASUS ZenFone Max Pro M1 32GB - CellphoneS 283 Hồ Tùng Mậu, Cầu Giấy, Hà Nội - amount: 9	1	[{"added": {}}]	19	1
461	2018-12-04 02:01:43.803368+07	184	ASUS ZenFone Max Pro M1 32GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 13	1	[{"added": {}}]	19	1
462	2018-12-04 02:02:17.289099+07	185	ASUS ZenFone Max Pro M1 32GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 10	1	[{"added": {}}]	19	1
463	2018-12-04 02:02:22.604045+07	186	ASUS ZenFone Max Pro M1 32GB - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 7	1	[{"added": {}}]	19	1
464	2018-12-04 02:02:33.478574+07	187	ASUS ZenFone Max Pro M1 32GB - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 7	1	[{"added": {}}]	19	1
465	2018-12-04 02:02:41.21481+07	188	ASUS ZenFone Max Pro M1 32GB - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 10	1	[{"added": {}}]	19	1
466	2018-12-04 02:02:54.128667+07	189	ASUS ZenFone Max Pro M1 32GB - CellphoneS 248 Nguyễn Thị Thập, P. Tân Quy, Q. 7 - amount: 9	1	[{"added": {}}]	19	1
467	2018-12-04 02:03:00.608802+07	190	ASUS ZenFone Max Pro M1 32GB - CellphoneS 243 Đỗ Xuân Hợp, Phước Long B, Quận 9 - amount: 1	1	[{"added": {}}]	19	1
468	2018-12-04 02:26:45.428549+07	17	ASUS ZenFone Max Pro M1 32GB	2	[]	16	1
469	2018-12-04 02:27:25.841622+07	18	ASUS ZenFone Max Pro M1 64GB Chính hãng	1	[{"added": {}}]	15	1
470	2018-12-04 02:27:26.688192+07	18	ASUS ZenFone Max Pro M1 64GB	1	[{"added": {}}]	16	1
471	2018-12-04 02:28:19.979649+07	30	ASUS ZenFone Max Pro M1 64GB - 64 GB - Bạc, Đen	1	[{"added": {}}]	14	1
472	2018-12-04 02:28:33.770283+07	16	Bảo hành điện thoại ASUS ZenFone Max Pro M1	1	[{"added": {}}]	8	1
473	2018-12-04 02:28:41.390504+07	15	Bảo hành điện thoại ASUS ZenFone Max Pro M1	3		8	1
474	2018-12-04 02:28:50.504017+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
475	2018-12-04 02:29:12.011591+07	18	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
476	2018-12-04 02:29:27.570491+07	191	ASUS ZenFone Max Pro M1 64GB - CellphoneS 157-159 Nguyễn Thị Minh Khai, P. Phạm Ngũ Lão, Q. 1 - amount: 9	1	[{"added": {}}]	19	1
477	2018-12-04 02:29:35.124151+07	192	ASUS ZenFone Max Pro M1 64GB - CellphoneS 288 Đường 3/2, P. 12, Q. 10 - amount: 10	1	[{"added": {}}]	19	1
478	2018-12-04 02:29:41.113843+07	193	ASUS ZenFone Max Pro M1 64GB - CellphoneS 59 Quang Trung, P. 10, Q. Gò Vấp - amount: 4	1	[{"added": {}}]	19	1
479	2018-12-04 02:29:46.859466+07	194	ASUS ZenFone Max Pro M1 64GB - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - amount: 15	1	[{"added": {}}]	19	1
480	2018-12-04 02:29:53.693363+07	195	ASUS ZenFone Max Pro M1 64GB - CellphoneS 177 Khánh Hội, P. 3, Q. 4 - amount: 7	1	[{"added": {}}]	19	1
481	2018-12-04 02:30:02.909211+07	196	ASUS ZenFone Max Pro M1 64GB - CellphoneS 5 Nguyễn Kiệm, P. 3, Q. Gò Vấp - amount: 13	1	[{"added": {}}]	19	1
482	2018-12-04 02:30:15.801143+07	197	ASUS ZenFone Max Pro M1 64GB - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 7	1	[{"added": {}}]	19	1
483	2018-12-04 02:30:21.063621+07	198	ASUS ZenFone Max Pro M1 64GB - CellphoneS 21 Thái Hà, P. Trung Liệt, Q. Đống Đa - amount: 13	1	[{"added": {}}]	19	1
484	2018-12-04 02:30:27.383667+07	199	ASUS ZenFone Max Pro M1 64GB - CellphoneS 21A Hàng Bài, P. Hàng Bài, Q. Hoàn Kiếm - amount: 3	1	[{"added": {}}]	19	1
485	2018-12-04 02:30:31.99561+07	200	ASUS ZenFone Max Pro M1 64GB - CellphoneS 306 Cầu Giấy, P. Dịch Vọng, Q. Cầu Giấy - amount: 2	1	[{"added": {}}]	19	1
486	2018-12-04 02:30:36.498015+07	201	ASUS ZenFone Max Pro M1 64GB - CellphoneS 524 Bạch Mai, P. Trương Định, Q. Hai Bà Trưng - amount: 12	1	[{"added": {}}]	19	1
487	2018-12-04 02:30:42.904649+07	202	ASUS ZenFone Max Pro M1 64GB - CellphoneS 160 Nguyễn Khánh Toàn, P. Quan Hoa, Q .Cầu Giấy - amount: 8	1	[{"added": {}}]	19	1
488	2018-12-04 02:30:52.811281+07	203	ASUS ZenFone Max Pro M1 64GB - CellphoneS 212 Khương Đình, Thanh Xuân, Hà Nội - amount: 6	1	[{"added": {}}]	19	1
489	2018-12-04 02:32:39.892416+07	19	ASUS ZenFone Max Pro M1 6GB RAM 64GB Chính hãng	1	[{"added": {}}]	15	1
490	2018-12-04 02:32:42.595943+07	19	ASUS ZenFone Max Pro M1 6GB RAM 64GB	1	[{"added": {}}]	16	1
491	2018-12-04 02:33:29.701321+07	31	ASUS ZenFone Max Pro M1 6GB RAM 64GB - 64 GB - Bạc, Đen	1	[{"added": {}}]	14	1
492	2018-12-04 02:33:42.572039+07	16	Bảo hành điện thoại ASUS ZenFone Max Pro M1	2	[{"changed": {"fields": ["productId"]}}]	8	1
493	2018-12-04 02:33:51.533046+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
494	2018-12-04 02:34:12.107791+07	19	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1 6GB RAM 64GB - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
495	2018-12-04 02:37:53.508826+07	20	ASUS ZenFone Max Plus M1 Chính hãng	1	[{"added": {}}]	15	1
496	2018-12-04 02:37:56.850938+07	20	ASUS ZenFone Max Plus M1	1	[{"added": {}}]	16	1
497	2018-12-04 02:41:35.888096+07	32	ASUS ZenFone Max Plus M1 - 32 GB - Xanh dương	1	[{"added": {}}]	14	1
498	2018-12-04 02:41:44.339528+07	16	Bảo hành điện thoại ASUS ZenFone Max Pro M1	2	[{"changed": {"fields": ["productId"]}}]	8	1
499	2018-12-04 02:41:50.704971+07	1	FE CREDIT	2	[{"changed": {"fields": ["productId"]}}]	9	1
500	2018-12-04 02:42:13.133026+07	20	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Plus M1 - discount:0.0 - duration: 2018-11-12 - 2019-07-19 	1	[{"added": {}}]	17	1
501	2018-12-04 02:42:26.821638+07	204	ASUS ZenFone Max Plus M1 - 278-280 Nguyễn Văn Cừ, P. Ngọc Lâm, Q. Long Biên - amount: 12	1	[{"added": {}}]	19	1
502	2018-12-04 02:42:34.211822+07	205	ASUS ZenFone Max Plus M1 - CellphoneS 543 Nguyễn Trãi, P. Thanh Xuân Nam, Q. Thanh Xuân - amount: 15	1	[{"added": {}}]	19	1
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
7	site2	category
8	site2	guarantee
9	site2	installment
10	site2	languagesupport
11	site2	manufacturer
12	site2	phonecode
13	site2	phonefeature
14	site2	phoneinfo
15	site2	post
16	site2	product
17	site2	saleoff
18	site2	store
19	site2	storeinventory
20	site2	phoneinfo_phonelanguage
21	site2	installment_productid
22	site2	guarantee_productid
\.


--
-- Data for Name: django_migrations; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_migrations (id, app, name, applied) FROM stdin;
1	contenttypes	0001_initial	2018-11-12 21:53:18.081013+07
2	auth	0001_initial	2018-11-12 21:53:18.188818+07
3	admin	0001_initial	2018-11-12 21:53:18.234084+07
4	admin	0002_logentry_remove_auto_add	2018-11-12 21:53:18.247755+07
5	admin	0003_logentry_add_action_flag_choices	2018-11-12 21:53:18.261068+07
6	contenttypes	0002_remove_content_type_name	2018-11-12 21:53:18.292478+07
7	auth	0002_alter_permission_name_max_length	2018-11-12 21:53:18.30218+07
8	auth	0003_alter_user_email_max_length	2018-11-12 21:53:18.322458+07
9	auth	0004_alter_user_username_opts	2018-11-12 21:53:18.343398+07
10	auth	0005_alter_user_last_login_null	2018-11-12 21:53:18.361944+07
11	auth	0006_require_contenttypes_0002	2018-11-12 21:53:18.366066+07
12	auth	0007_alter_validators_add_error_messages	2018-11-12 21:53:18.38328+07
13	auth	0008_alter_user_username_max_length	2018-11-12 21:53:18.412888+07
14	auth	0009_alter_user_last_name_max_length	2018-11-12 21:53:18.431037+07
15	sessions	0001_initial	2018-11-12 21:53:18.454105+07
16	site2	0001_initial	2018-11-12 21:53:18.684018+07
17	site2	0002_auto_20181112_1635	2018-11-12 23:35:24.576796+07
18	site2	0003_phonefeature_featurename	2018-11-13 00:14:05.760175+07
19	site2	0002_auto_20181112_1715	2018-11-13 00:16:54.771092+07
20	site2	0003_auto_20181112_1718	2018-11-13 00:19:13.037475+07
21	site2	0004_remove_phonefeature_phoneinfo	2018-11-13 00:21:47.636494+07
22	site2	0005_phonefeature_phoneinfo	2018-11-13 00:23:19.190785+07
23	site2	0006_remove_phoneinfo_memorycardslot	2018-11-13 13:53:17.536456+07
24	site2	0007_auto_20181113_0702	2018-11-13 14:02:58.55276+07
25	site2	0008_phoneinfo_phonecase	2018-11-13 14:25:32.691939+07
26	site2	0009_phoneinfo_other	2018-11-13 14:29:28.417211+07
27	site2	0010_auto_20181113_1744	2018-11-14 00:44:48.443662+07
28	site2	0011_remove_phonefeature_phoneinfo	2018-12-03 21:34:46.822365+07
29	site2	0012_phonefeature_phonecategorytype	2018-12-03 21:42:23.18575+07
30	site2	0013_auto_20181203_1619	2018-12-03 23:19:23.254899+07
31	site2	0014_auto_20181203_1731	2018-12-04 00:31:54.326899+07
\.


--
-- Data for Name: django_session; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_session (session_key, session_data, expire_date) FROM stdin;
58cosgvlbk6agrjj4k8hxgvkxxkl0una	OWQ0YWMxNTIxODIyM2QxZWIzM2Q3ZTUzODkyMWM1ZmE1NjA2OGRhOTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI3MGQwMzY1N2RkN2Y2MDcxYWQyODgyN2I4ZWVlOTc4NTZhODJjZDBhIn0=	2018-11-27 10:13:11.872876+07
ed3wyhnrl8eeb75lvcjuejkk5imo8gii	OWQ0YWMxNTIxODIyM2QxZWIzM2Q3ZTUzODkyMWM1ZmE1NjA2OGRhOTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI3MGQwMzY1N2RkN2Y2MDcxYWQyODgyN2I4ZWVlOTc4NTZhODJjZDBhIn0=	2018-12-11 21:22:41.700617+07
\.


--
-- Name: Category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Category_id_seq"', 8, true);


--
-- Name: Guarantee_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Guarantee_id_seq"', 16, true);


--
-- Name: Guarantee_productId_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Guarantee_productId_id_seq"', 19, true);


--
-- Name: Installment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Installment_id_seq"', 2, true);


--
-- Name: Installment_productId_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Installment_productId_id_seq"', 30, true);


--
-- Name: LanguageSupport_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."LanguageSupport_id_seq"', 4, true);


--
-- Name: Manufacturer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Manufacturer_id_seq"', 4, true);


--
-- Name: PhoneCode_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."PhoneCode_id_seq"', 6, true);


--
-- Name: PhoneFeature_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."PhoneFeature_id_seq"', 14, true);


--
-- Name: PhoneInfo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."PhoneInfo_id_seq"', 32, true);


--
-- Name: PhoneInfo_phoneLanguage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."PhoneInfo_phoneLanguage_id_seq"', 79, true);


--
-- Name: Post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Post_id_seq"', 20, true);


--
-- Name: Product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Product_id_seq"', 20, true);


--
-- Name: SaleOff_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."SaleOff_id_seq"', 20, true);


--
-- Name: StoreInventory_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."StoreInventory_id_seq"', 205, true);


--
-- Name: Store_CT_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Store_CT_id_seq"', 32, true);


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

SELECT pg_catalog.setval('public.auth_user_id_seq', 1, true);


--
-- Name: auth_user_user_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.auth_user_user_permissions_id_seq', 1, false);


--
-- Name: django_admin_log_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_admin_log_id_seq', 502, true);


--
-- Name: django_content_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_content_type_id_seq', 22, true);


--
-- Name: django_migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_migrations_id_seq', 31, true);


--
-- Name: Category Category_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Category"
    ADD CONSTRAINT "Category_pkey" PRIMARY KEY (id);


--
-- Name: Guarantee Guarantee_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee"
    ADD CONSTRAINT "Guarantee_pkey" PRIMARY KEY (id);


--
-- Name: Guarantee_productId Guarantee_productId_guarantee_id_product_id_097c2abc_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee_productId"
    ADD CONSTRAINT "Guarantee_productId_guarantee_id_product_id_097c2abc_uniq" UNIQUE (guarantee_id, product_id);


--
-- Name: Guarantee_productId Guarantee_productId_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee_productId"
    ADD CONSTRAINT "Guarantee_productId_pkey" PRIMARY KEY (id);


--
-- Name: Installment Installment_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment"
    ADD CONSTRAINT "Installment_pkey" PRIMARY KEY (id);


--
-- Name: Installment_productId Installment_productId_installment_id_product_id_61def5fa_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment_productId"
    ADD CONSTRAINT "Installment_productId_installment_id_product_id_61def5fa_uniq" UNIQUE (installment_id, product_id);


--
-- Name: Installment_productId Installment_productId_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment_productId"
    ADD CONSTRAINT "Installment_productId_pkey" PRIMARY KEY (id);


--
-- Name: LanguageSupport LanguageSupport_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."LanguageSupport"
    ADD CONSTRAINT "LanguageSupport_pkey" PRIMARY KEY (id);


--
-- Name: Manufacturer Manufacturer_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Manufacturer"
    ADD CONSTRAINT "Manufacturer_pkey" PRIMARY KEY (id);


--
-- Name: PhoneCode PhoneCode_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneCode"
    ADD CONSTRAINT "PhoneCode_pkey" PRIMARY KEY (id);


--
-- Name: PhoneFeature PhoneFeature_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneFeature"
    ADD CONSTRAINT "PhoneFeature_pkey" PRIMARY KEY (id);


--
-- Name: PhoneInfo_phoneLanguage PhoneInfo_phoneLanguage_phoneinfo_id_languagesup_8ec9bd56_uniq; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo_phoneLanguage"
    ADD CONSTRAINT "PhoneInfo_phoneLanguage_phoneinfo_id_languagesup_8ec9bd56_uniq" UNIQUE (phoneinfo_id, languagesupport_id);


--
-- Name: PhoneInfo_phoneLanguage PhoneInfo_phoneLanguage_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo_phoneLanguage"
    ADD CONSTRAINT "PhoneInfo_phoneLanguage_pkey" PRIMARY KEY (id);


--
-- Name: PhoneInfo PhoneInfo_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo"
    ADD CONSTRAINT "PhoneInfo_pkey" PRIMARY KEY (id);


--
-- Name: Post Post_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Post"
    ADD CONSTRAINT "Post_pkey" PRIMARY KEY (id);


--
-- Name: Product Product_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT "Product_pkey" PRIMARY KEY (id);


--
-- Name: SaleOff SaleOff_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff"
    ADD CONSTRAINT "SaleOff_pkey" PRIMARY KEY (id);


--
-- Name: StoreInventory StoreInventory_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."StoreInventory"
    ADD CONSTRAINT "StoreInventory_pkey" PRIMARY KEY (id);


--
-- Name: Store_CT Store_CT_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Store_CT"
    ADD CONSTRAINT "Store_CT_pkey" PRIMARY KEY (id);


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
-- Name: Guarantee_productId_guarantee_id_133c3e51; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Guarantee_productId_guarantee_id_133c3e51" ON public."Guarantee_productId" USING btree (guarantee_id);


--
-- Name: Guarantee_productId_product_id_763e18a5; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Guarantee_productId_product_id_763e18a5" ON public."Guarantee_productId" USING btree (product_id);


--
-- Name: Installment_productId_installment_id_cc5d4463; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Installment_productId_installment_id_cc5d4463" ON public."Installment_productId" USING btree (installment_id);


--
-- Name: Installment_productId_product_id_7afae8c6; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Installment_productId_product_id_7afae8c6" ON public."Installment_productId" USING btree (product_id);


--
-- Name: PhoneInfo_phoneCode_ce61e3a0; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "PhoneInfo_phoneCode_ce61e3a0" ON public."PhoneInfo" USING btree ("phoneCode");


--
-- Name: PhoneInfo_phoneFeature_f1da98e7; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "PhoneInfo_phoneFeature_f1da98e7" ON public."PhoneInfo" USING btree ("phoneFeature");


--
-- Name: PhoneInfo_phoneLanguage_languagesupport_id_47d94a53; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "PhoneInfo_phoneLanguage_languagesupport_id_47d94a53" ON public."PhoneInfo_phoneLanguage" USING btree (languagesupport_id);


--
-- Name: PhoneInfo_phoneLanguage_phoneinfo_id_7b7c0119; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "PhoneInfo_phoneLanguage_phoneinfo_id_7b7c0119" ON public."PhoneInfo_phoneLanguage" USING btree (phoneinfo_id);


--
-- Name: PhoneInfo_phoneProductId_01a754f5; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "PhoneInfo_phoneProductId_01a754f5" ON public."PhoneInfo" USING btree ("phoneProductId");


--
-- Name: Product_productCategoryId_a7e0e36f; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Product_productCategoryId_a7e0e36f" ON public."Product" USING btree ("productCategoryId");


--
-- Name: Product_productManufacturerId_54108a8c; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Product_productManufacturerId_54108a8c" ON public."Product" USING btree ("productManufacturerId");


--
-- Name: Product_productPostId_d8571f34; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "Product_productPostId_d8571f34" ON public."Product" USING btree ("productPostId");


--
-- Name: SaleOff_productId_f2d25674; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "SaleOff_productId_f2d25674" ON public."SaleOff" USING btree ("productId");


--
-- Name: StoreInventory_productId_ec5c011b; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "StoreInventory_productId_ec5c011b" ON public."StoreInventory" USING btree ("productId");


--
-- Name: StoreInventory_storeId_334c15ab; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "StoreInventory_storeId_334c15ab" ON public."StoreInventory" USING btree ("storeId");


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
-- Name: Guarantee_productId Guarantee_productId_guarantee_id_133c3e51_fk_Guarantee_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee_productId"
    ADD CONSTRAINT "Guarantee_productId_guarantee_id_133c3e51_fk_Guarantee_id" FOREIGN KEY (guarantee_id) REFERENCES public."Guarantee"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Guarantee_productId Guarantee_productId_product_id_763e18a5_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Guarantee_productId"
    ADD CONSTRAINT "Guarantee_productId_product_id_763e18a5_fk_Product_id" FOREIGN KEY (product_id) REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Installment_productId Installment_productId_installment_id_cc5d4463_fk_Installment_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment_productId"
    ADD CONSTRAINT "Installment_productId_installment_id_cc5d4463_fk_Installment_id" FOREIGN KEY (installment_id) REFERENCES public."Installment"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Installment_productId Installment_productId_product_id_7afae8c6_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Installment_productId"
    ADD CONSTRAINT "Installment_productId_product_id_7afae8c6_fk_Product_id" FOREIGN KEY (product_id) REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: PhoneInfo PhoneInfo_phoneCode_ce61e3a0_fk_PhoneCode_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo"
    ADD CONSTRAINT "PhoneInfo_phoneCode_ce61e3a0_fk_PhoneCode_id" FOREIGN KEY ("phoneCode") REFERENCES public."PhoneCode"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: PhoneInfo PhoneInfo_phoneFeature_f1da98e7_fk_PhoneFeature_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo"
    ADD CONSTRAINT "PhoneInfo_phoneFeature_f1da98e7_fk_PhoneFeature_id" FOREIGN KEY ("phoneFeature") REFERENCES public."PhoneFeature"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: PhoneInfo_phoneLanguage PhoneInfo_phoneLangu_languagesupport_id_47d94a53_fk_LanguageS; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo_phoneLanguage"
    ADD CONSTRAINT "PhoneInfo_phoneLangu_languagesupport_id_47d94a53_fk_LanguageS" FOREIGN KEY (languagesupport_id) REFERENCES public."LanguageSupport"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: PhoneInfo_phoneLanguage PhoneInfo_phoneLanguage_phoneinfo_id_7b7c0119_fk_PhoneInfo_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo_phoneLanguage"
    ADD CONSTRAINT "PhoneInfo_phoneLanguage_phoneinfo_id_7b7c0119_fk_PhoneInfo_id" FOREIGN KEY (phoneinfo_id) REFERENCES public."PhoneInfo"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: PhoneInfo PhoneInfo_phoneProductId_01a754f5_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."PhoneInfo"
    ADD CONSTRAINT "PhoneInfo_phoneProductId_01a754f5_fk_Product_id" FOREIGN KEY ("phoneProductId") REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Product Product_productCategoryId_a7e0e36f_fk_Category_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT "Product_productCategoryId_a7e0e36f_fk_Category_id" FOREIGN KEY ("productCategoryId") REFERENCES public."Category"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Product Product_productManufacturerId_54108a8c_fk_Manufacturer_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT "Product_productManufacturerId_54108a8c_fk_Manufacturer_id" FOREIGN KEY ("productManufacturerId") REFERENCES public."Manufacturer"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: Product Product_productPostId_d8571f34_fk_Post_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Product"
    ADD CONSTRAINT "Product_productPostId_d8571f34_fk_Post_id" FOREIGN KEY ("productPostId") REFERENCES public."Post"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: SaleOff SaleOff_productId_f2d25674_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."SaleOff"
    ADD CONSTRAINT "SaleOff_productId_f2d25674_fk_Product_id" FOREIGN KEY ("productId") REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: StoreInventory StoreInventory_productId_ec5c011b_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."StoreInventory"
    ADD CONSTRAINT "StoreInventory_productId_ec5c011b_fk_Product_id" FOREIGN KEY ("productId") REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: StoreInventory StoreInventory_storeId_334c15ab_fk_Store_CT_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."StoreInventory"
    ADD CONSTRAINT "StoreInventory_storeId_334c15ab_fk_Store_CT_id" FOREIGN KEY ("storeId") REFERENCES public."Store_CT"(id) DEFERRABLE INITIALLY DEFERRED;


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

