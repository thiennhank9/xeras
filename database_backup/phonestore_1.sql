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
-- Name: BuyAndAllowChange; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."BuyAndAllowChange" (
    id integer NOT NULL,
    "buyAndAllowChangeName" text NOT NULL,
    "dateStart" date NOT NULL,
    "dateEnd" date NOT NULL,
    other text NOT NULL,
    "productId" integer NOT NULL
);


ALTER TABLE public."BuyAndAllowChange" OWNER TO xeras;

--
-- Name: BuyAndAllowChange_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."BuyAndAllowChange_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."BuyAndAllowChange_id_seq" OWNER TO xeras;

--
-- Name: BuyAndAllowChange_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."BuyAndAllowChange_id_seq" OWNED BY public."BuyAndAllowChange".id;


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
-- Name: DayReceivedPhone; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."DayReceivedPhone" (
    id integer NOT NULL,
    "receivedDate" date,
    "productId" integer NOT NULL,
    "storeId" integer NOT NULL
);


ALTER TABLE public."DayReceivedPhone" OWNER TO xeras;

--
-- Name: DayReceivedPhone_id_seq; Type: SEQUENCE; Schema: public; Owner: xeras
--

CREATE SEQUENCE public."DayReceivedPhone_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."DayReceivedPhone_id_seq" OWNER TO xeras;

--
-- Name: DayReceivedPhone_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: xeras
--

ALTER SEQUENCE public."DayReceivedPhone_id_seq" OWNED BY public."DayReceivedPhone".id;


--
-- Name: Guarantee; Type: TABLE; Schema: public; Owner: xeras
--

CREATE TABLE public."Guarantee" (
    id integer NOT NULL,
    "guaranteeName" text NOT NULL,
    duration integer NOT NULL,
    note text NOT NULL
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
    color text NOT NULL,
    price1 double precision NOT NULL,
    price2 double precision NOT NULL,
    "phone3G" text NOT NULL,
    "phone4G" text NOT NULL,
    "dateStartSell" date,
    width double precision,
    height double precision,
    thickness double precision,
    weight double precision,
    "simNumber" integer NOT NULL,
    "simType" text NOT NULL,
    "screenType" text NOT NULL,
    inch double precision NOT NULL,
    resolution text NOT NULL,
    "osType" text NOT NULL,
    "osVersion" text NOT NULL,
    chipset text NOT NULL,
    "GPU" text NOT NULL,
    "memoryCardSlot" text NOT NULL,
    "RAM" integer NOT NULL,
    "ROM" integer NOT NULL,
    "cameraBack" double precision NOT NULL,
    "cameraFront" double precision NOT NULL,
    video text NOT NULL,
    "WLAN" text NOT NULL,
    bluetooth text NOT NULL,
    "GPS" text NOT NULL,
    "NFC" text NOT NULL,
    "Pin" text NOT NULL,
    version text NOT NULL,
    "fromCountry" text NOT NULL,
    "fromType" text NOT NULL,
    status text NOT NULL,
    "phoneInfoType" text NOT NULL,
    "chargerType" text NOT NULL,
    "chargerTime" double precision NOT NULL,
    "phoneTimeUsing" text NOT NULL,
    "phoneCase" text NOT NULL,
    other text NOT NULL,
    "phoneCode" integer NOT NULL,
    "phoneFeature" integer NOT NULL,
    "phoneProductId" integer NOT NULL
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
    "saleOffName" text NOT NULL,
    "saleOffPrice" double precision NOT NULL,
    "dateStart" date NOT NULL,
    "dateEnd" date NOT NULL,
    other text NOT NULL,
    "productId" integer NOT NULL
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
-- Name: BuyAndAllowChange id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."BuyAndAllowChange" ALTER COLUMN id SET DEFAULT nextval('public."BuyAndAllowChange_id_seq"'::regclass);


--
-- Name: Category id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Category" ALTER COLUMN id SET DEFAULT nextval('public."Category_id_seq"'::regclass);


--
-- Name: DayReceivedPhone id; Type: DEFAULT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."DayReceivedPhone" ALTER COLUMN id SET DEFAULT nextval('public."DayReceivedPhone_id_seq"'::regclass);


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
-- Data for Name: BuyAndAllowChange; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."BuyAndAllowChange" (id, "buyAndAllowChangeName", "dateStart", "dateEnd", other, "productId") FROM stdin;
2	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR	2019-01-21	2019-01-31	Tất cả các chức năng đều hoạt động bình thường.\r\nMáy không cần có hộp, không cần có phụ kiện đi kèm hộp (tai nghe, cáp sạc, củ sạc…)\r\nMáy có thể mở, tắt nguồn và cắm sạc pin bình thường Máy không bị biến dạng (cong, vẹo)\r\nMáy đã được tắt/ ngắt hoạt động và log out khỏi tất cả các tính năng bảo mật máy và khóa máy từ xa (ví dụ như iCloud ...)\r\nMàn hình của máy vẫn hoạt động tốt, nếu có lỗi sẽ định giá riêng\r\nChấp nhận cả máy xách tay.	1
1	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR	2019-01-21	2019-01-31	Tất cả các chức năng đều hoạt động bình thường.\r\nMáy không cần có hộp, không cần có phụ kiện đi kèm hộp (tai nghe, cáp sạc, củ sạc…)\r\nMáy có thể mở, tắt nguồn và cắm sạc pin bình thường Máy không bị biến dạng (cong, vẹo)\r\nMáy đã được tắt/ ngắt hoạt động và log out khỏi tất cả các tính năng bảo mật máy và khóa máy từ xa (ví dụ như iCloud ...)\r\nMàn hình của máy vẫn hoạt động tốt, nếu có lỗi sẽ định giá riêng\r\nChấp nhận cả máy xách tay.	3
\.


--
-- Data for Name: Category; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Category" (id, "categoryName") FROM stdin;
1	Iphone
2	SamSung Galaxy
4	Xiaomi Mi
5	Xiaomi Redmi
6	oppo
7	Asus
8	Huewei
\.


--
-- Data for Name: DayReceivedPhone; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."DayReceivedPhone" (id, "receivedDate", "productId", "storeId") FROM stdin;
1	2019-01-31	1	4
\.


--
-- Data for Name: Guarantee; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."Guarantee" (id, "guaranteeName", duration, note) FROM stdin;
1	Bảo hành điện thoại Iphone XS Max	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
2	Bảo hành điện thoại Samsung Galaxy Note 9	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
3	Bảo hành điện thoại Iphone X	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
4	Bảo hành điện thoại Iphone 8 plus	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
5	Bảo hành điện thoại Iphone 8	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
6	Bảo hành điện thoại Iphone 7 (Certified Pre-Owned)	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
7	Bảo hành điện thoại Samsung Galaxy A9	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
8	Bảo hành điện thoại Samsung Galaxy A7	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
9	Bảo hành điện thoại Samsung Galaxy J6 Plus	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
10	Bảo hành điện thoại Samsung Galaxy S8+	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
11	Bảo hành điện thoại Samsung Galaxy S9+	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
12	Bảo hành điện thoại Redmi S2	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
13	Bảo hành điện thoại Xiaomi Mi 8 Lite	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
14	Bảo hành điện thoại Xiaomi Mi 8	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
16	Bảo hành điện thoại ASUS ZenFone Max Pro M1	1	Không bảo hành trong tình trạng rơi vơ. Điện thoại vào nước trong thời gian dài
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
7	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 8 / Iphone 8 Plus
8	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 7 / Iphone 7 Plus
9	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone 6 / Iphone 6 Plus
10	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy A9 | A7
11	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy J6 Plus | J6
12	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Samsung galaxy S8+ | S8 | S9+ | S9
14	Liên quân,tạm ổn; alpha 8,tạm ổn	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	ASUS ZenFone M1
13	Liên quân,trung bình; alpha 8,hơi giật	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh sặc sỡ, camera kép	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 2 tiếng;nghe nhạc, 2 tiếng	Redmi S2 | Mi 8
6	Liên quân,mượt; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	SamSung Galaxy Note 9
1	Liên quân,khá; alpha 8,chơi mượt	nghe nhạc trực tuyến, zing music, spotify	Chụp ảnh thiếu sáng, camera kép, chụp ảnh xóa phông	Quay phim chống rung lắc	zalo call, skype, gọi thoại truyền thống	chơi game, 5 tiếng;nghe nhạc, 3 tiếng	Iphone X / Iphone XS Max
\.


--
-- Data for Name: PhoneInfo; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneInfo" (id, color, price1, price2, "phone3G", "phone4G", "dateStartSell", width, height, thickness, weight, "simNumber", "simType", "screenType", inch, resolution, "osType", "osVersion", chipset, "GPU", "memoryCardSlot", "RAM", "ROM", "cameraBack", "cameraFront", video, "WLAN", bluetooth, "GPS", "NFC", "Pin", version, "fromCountry", "fromType", status, "phoneInfoType", "chargerType", "chargerTime", "phoneTimeUsing", "phoneCase", other, "phoneCode", "phoneFeature", "phoneProductId") FROM stdin;
6	vàng	32.7999999999999972	32.7999999999999972	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	208	1	Nano-SIM	Super Retina OLED	6.5	1242 x 2688 pixel	IOS	12	Apple A12 Bionic 6 nhân	Apple GPU 4 nhân	1	4	64	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Phiên bản Quốc tế	California	Chính hãng	like new	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	1	1
9	Xanh Dương	22.8999999999999986	22.8999999999999986	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	201	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6.40000000000000036	1440 x 2960 pixels	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	1	6	128	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Quốc Tế	Korea	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	1.5	6-8 tiếng	Vỏ kim loại	Chống nước	2	6	2
10	Đen	22.8999999999999986	22.8999999999999986	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	201	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6.40000000000000036	1440 x 2960 pixels	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	1	6	128	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Quốc Tế	Korea	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	1.5	6-8 tiếng	Vỏ kim loại	Chống nước	2	6	2
7	Xám, Xám bạc, Bạc	31.8000000000000007	31.8000000000000007	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	208	1	Nano-SIM	Super Retina OLED	6.5	1242 x 2688 pixel	IOS	12	Apple A12 Bionic 6 nhân	Apple GPU 4 nhân	1	4	64	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Quốc tế	California	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	1	1
11	Đồng	22.8999999999999986	22.8999999999999986	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	161.900000000000006	76.4000000000000057	8.80000000000000071	201	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6.40000000000000036	1440 x 2960 pixels	Android	8.1 (Oreo)	Samsung Exynos 9 9810 Octa	4x 2.7 GHz Exynos M3 Mongoose & 4x 1.7 GHz ARM Cortex-A55	1	6	128	12	8	2160p@60fps, 1080p@240fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 4000 mAh	Quốc Tế	Korea	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	1.5	6-8 tiếng	Vỏ kim loại	Chống nước	2	6	2
5	Vàng	35.5	35.5	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	208	1	Nano-SIM	Super Retina OLED	6.5	1242 x 2688 pixel	IOS	12	Apple A12 Bionic 6 nhân	Apple GPU 4 nhân	1	4	512	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Quốc tế	California	Chính hãng	like new	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	1	1
12	Bạc, Xám	21.5	21.5	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (3CA) Cat12 600/150 Mbps	2018-12-03	143.599999999999994	70.9000000000000057	7.70000000000000018	174	1	Nano-SIM	Cảm ứng điện dung OLED, 16 triệu màu	5.79999999999999982	1125 x 2436 pixels	iOS	11	Apple A11 Bionic APL1W72	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	1	3	64	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2716 mAh	Quốc Tế	Mỹ	Nhập khẩu	Mới 100%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ kim loại	Chống nước	1	1	3
13	Bạc, Xám	17.8999999999999986	17.8999999999999986	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	202	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	5.5	1080 x 1920 pixels	iOS	11	Apple A11 Bionic APL1W72	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	1	3	64	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Quốc Tế	Mỹ	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	7	4
14	Vàng	18	18	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	202	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	5.5	1080 x 1920 pixels	iOS	11	Apple A11 Bionic APL1W72	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	1	3	64	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Quốc Tế	Mỹ	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	7	4
15	Đỏ	18.1999999999999993	18.1999999999999993	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	158.400000000000006	78.0999999999999943	7.5	202	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	5.5	1080 x 1920 pixels	iOS	11	Apple A11 Bionic APL1W72	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	1	3	64	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	5.0, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2691 mAh	Quốc Tế	Mỹ	Chính hãng	Mới 100%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	7	4
16	Vàng, Hồng	15	15	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (3CA) Cat9 450/50 Mbps	2018-12-03	158.199999999999989	77.9000000000000057	7.29999999999999982	188	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	4.70000000000000018	1080 x 1920 pixels	iOS	11	Apple A10 Fusion APL1W24	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	Không	3	128	12	7	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 2900 mAh	Certified Pre-Owned; Mở bán lại, đổi trả bảo hành	Mỹ	Chính hãng	Certified Pre-Owned; Mở bán lại, đổi trả bảo hành	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	8	6
17	Vàng	6	6	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	138.300000000000011	67.0999999999999943	7.09999999999999964	143	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	4.70000000000000018	1080 x 1920 pixels	iOS	11	Apple A9 APL0898	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	Không	2	64	12	5	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 1715 mAh	Hàng cũ	Mỹ	Chính hãng	Hàng cũ, 99%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	9	7
18	Hồng, Xám	5.90000000000000036	5.90000000000000036	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	138.300000000000011	67.0999999999999943	7.09999999999999964	143	1	Nano-SIM	Cảm ứng điện dung LED-backlit IPS LCD, 16 triệu màu	4.70000000000000018	1080 x 1920 pixels	iOS	11	Apple A9 APL0898	2x 2.39 GHz Monsoon & 4x 2.39 GHz Mistral	Không	2	64	12	5	2160p@24/30/60fps, 1080p@30/60/120/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, GALILEO, QZSS	Yes	Li-ion 1715 mAh	Hàng cũ	Mỹ	Chính hãng	Hàng cũ, 99%	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	9	7
20	Hồng, Xanh dương, Đen	12.4000000000000004	12.4000000000000004	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	\N	\N	\N	\N	2	Nano-SIM	Super AMOLED cảm ứng điện dung, 16 triệu màu	6.28000000000000025	1080 x 2280 pixels	Android	Android 8.0	Qualcomm SDM660 Snapdragon 660	8 nhân (4 x 2.2 GHz Kryo 260 & 4 x 1.8 GHz Kryo 260)	microSD, hỗ trợ đến 256GB	26	128	4	24	1080p@30fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	Bluetooth 5.0	A-GPS, GLONASS, BDS, GALILEO	Yes	3720 mAh	Hàng mới	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	4-6 tiếng	Vỏ kim loại	Chống nước	2	10	8
21	Vàng, Xanh dương, Đen	7.59999999999999964	7.59999999999999964	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	159.800000000000011	76.7999999999999972	7.5	168	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6	1080 x 2220 pixels	Android	Android 8.0 (Oreo)	Exynoss 7885	8 nhân (2 x 2.2Ghz Cortex-A73, 6 x 1.6Ghz Cortex A53)	micro SD hỗ trợ đến 512GB	4	64	24	24	2160p@30fps, 1080p@30fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, WiFi Direct, hotspot	Bluetooth 5.0	A-GPS, GLONASS, BDS	Yes	3.300mAh	Hàng mới	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	2	4-6 tiếng	Vỏ kim loại	Màn hình tràn viền	2	10	9
22	Xám, Đen, Đỏ	4.59999999999999964	4.59999999999999964	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	161.400000000000006	76.9000000000000057	7.90000000000000036	178	2	Nano-SIM	Màn hình cảm ứng điện dung IPS LCD, 16 triệu màu	6	720 x 1480 pixels	Android	Android 8.1 (Oreo)	Qualcomm Snapdragon 425 MSM8917	4 nhân x 1.4GHz, Cortex-A53	micro SD hỗ trợ đến 512GB	3	32	13	8	Full HD 1080p@30fps	Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Hotspot	Bluetooth 4.2	A-GPS, GLONASS, BDS	Yes	3300mAh	Hàng mới	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	2	4-6 tiếng	Vỏ nhựa	Màn hình tràn viền	3	11	10
23	Tím, Đen	12.6999999999999993	12.6999999999999993	HSPA 42.2/5.76 Mbps	LTE-A (4CA) Cat16 1024/150 Mbps	2018-12-03	159.5	73.4000000000000057	8.09999999999999964	173	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6.20000000000000018	1440 x 2960 pixels	Android	7.0 (Nougat)	Samsung Exynos 9 Octa 8895	4x 2.3 GHz Exynos M2 Mongoose & 4x 1.7 GHz ARM Cortex-A53	microSD, lên đến 256 GB	4	64	12	8	2160p@30fps, 1080p@60fps, 720p@240fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3500 mAh	Hàng mới	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	8-10 tiếng	Vỏ kim loại	Màn hình vô cực	4	12	11
24	Tím, Xanh dương, Đen	18.8999999999999986	18.8999999999999986	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	158.099999999999994	73.7999999999999972	8.5	189	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	6.20000000000000018	1440 x 2960 pixels	Android	8.0 (Oreo)	Samsung Exynos 9 9810	4x 2.9 GHz Exynos M3 Mongoose & 4x 1.9 GHz ARM Cortex-A55	microSD, lên đến 256 GB	6	64	12	8	2160p@60fps, 1080p@60fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3500 mAh	Hàng mới	Hàn Quốc; Korea	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	8-10 tiếng	Vỏ kim loại	Màn hình vô cực	4	12	12
25	Vàng	7	7	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-12-03	148.900000000000006	68.0999999999999943	8	155	2	Nano-SIM	Cảm ứng điện dung Super AMOLED, 16 triệu màu	5.79999999999999982	1440 x 2960 pixels	Android	7.0 (Nougat)	Samsung Exynos 9 Octa 8895	4x 2.3 GHz Exynos M2 Mongoose & 4x 1.7 GHz ARM Cortex-A53	microSD, lên đến 256 GB	4	64	12	8	2160p@60fps, 1080p@60fps, 720p@960fps, HDR, quay video kép	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot	5.0, A2DP, LE, aptX	A-GPS, GLONASS, BDS, GALILEO	Yes	Li-ion 3000 mAh	Hàng cũ, like new, 99%	Hàn Quốc; Korea	Chính hãng	Hàng cũ, like new, 99%	SmartPhone	sạc 2 chấu	1.5	8-10 tiếng	Vỏ kim loại	Màn hình vô cực	4	12	13
26	Vàng, Xám	2.89999999999999991	2.89999999999999991	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	160.699999999999989	77.2999999999999972	8.09999999999999964	170	2	Nano-SIM	Cảm ứng điện dung IPS LCD, 16 triệu màu	6	720 x 1440 pixels	Android	8.1 (Oreo)	Qualcomm MSM8953 Snapdragon 625	8x 2.0 GHz Cortex-A53	microSD, lên đến 256 GB	4	64	12	16	1080p@30fps	Wi-Fi 802.11 b/g/n, WiFi Direct, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS	Yes	Li-Po 3080 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Tích hợp cảm biến vân tay cực nhạy	5	13	14
27	Đen	5.70000000000000018	5.70000000000000018	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	156.400000000000006	75.7999999999999972	7.5	169	2	Nano-SIM	IPS LCD	6.25999999999999979	1080 x 2280 pixels	Android	Android 8.1 (Oreo)	Qualcomm Snapdragon 660 8 nhân	4 nhân 2.2 GHz & 4 nhân 1.8 GHz	Không	4	64	12	24	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@120fps, Quay phim 4K 2160p@30fps	Wi-Fi 802.11 b/g/n, WiFi Direct, hotspot	A2DP, LE, v5.0	A-GPS, GLONASS	Yes	3350 mAh, Pin chuẩn Li-Ion	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	13	15
28	Trắng, Xanh dương, Đen	10.6999999999999993	10.6999999999999993	HSPA 42.2/5.76 Mbps	LTE-A (2CA) Cat6 300/50 Mbps	2018-12-03	154.900000000000006	74.7999999999999972	7.59999999999999964	175	2	Nano-SIM	Cảm ứng điện dung AMOLED, 16 triệu màu	6.20999999999999996	1080 x 2248 pixels	Android	Android 8.1 (Oreo)	4x 2.8 GHz Kryo 385 Gold & 4x 1.8 GHz Kryo 385 Silver	Qualcomm SDM845 Snapdragon 845	Không	6	64	12	20	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	5.0, A2DP, LE, aptX HD	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 3400 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	13	16
29	Bạc, Đen	4.20000000000000018	4.20000000000000018	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	180	2	Nano-SIM	Cảm ứng điện dung IPS LCD, 16 triệu màu	6	1080 x 2160 pixels	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	Không	3	32	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	14	17
30	Bạc, Đen	5.20000000000000018	5.20000000000000018	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	180	2	Nano-SIM	Cảm ứng điện dung IPS LCD, 16 triệu màu	6	1080 x 2160 pixels	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	Không	4	64	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	14	18
31	Bạc, Đen	6.40000000000000036	6.40000000000000036	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	180	2	Nano-SIM	Cảm ứng điện dung IPS LCD, 16 triệu màu	6	1080 x 2160 pixels	Android	Android 8.1 (Oreo)	Qualcomm SDM636 Snapdragon 636	4x 1.8 GHz Kryo 260 & 4x 1.6 GHz Kryo 260	Không	6	64	13	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.2, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 5000 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	14	19
32	Xanh dương	3.20000000000000018	3.20000000000000018	HSPA 42.2/5.76 Mbps	LTE Cat4 150/50 Mbps	2018-12-03	159	76	8.5	180	2	Nano-SIM	Cảm ứng điện dung IPS LCD, 16 triệu màu	5.70000000000000018	1080 x 2160 pixels	Android	7.0 (Nougat)	Mediatek MT6750T	4x 1.5 GHz ARM Cortex-A53 & 4x 1.0 GHz ARM Cortex-A53	microSD, lên đến 256 GB	3	32	16	8	2160p@60fps, 1080p@30/240fps	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot	4.0, A2DP, LE	A-GPS, GLONASS, BDS, GALILEO, QZSS	Yes	Li-Po 4130 mAh	Hàng mới	Trung Quốc; China	Chính hãng	Hàng mới	SmartPhone	sạc 2 chấu	1.5	2-5 tếng	Vỏ nhựa	Camera kép chụp ảnh xóa phông ảo diệu	6	14	20
33	Vàng	29.5	29.5	HSPA 42.2/5.76 Mbps	LTE-A (6CA) Cat18 1200/200 Mbps	2018-11-12	157.5	77.4000000000000057	7.70000000000000018	208	1	Nano-SIM	Super Retina OLED	6.5	1242 x 2688 pixel	IOS	12	Apple A12 Bionic 6 nhân	Apple GPU 4 nhân	1	4	256	12	7	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim FullHD 1080p@240fps, Quay phim 4K 2160p@24fps, Quay phim 4K 2160p@30fps, Quay phim 4K 2160p@60fps	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot	LE, A2DP, v5.0	A-GPS, GLONASS	Yes	Li-ion	Quốc tế	California	Chính hãng	like new	SmartPhone	sạc 2 chấu	2	6-8 tiếng	Vỏ nhôm	Chống nước	1	1	1
\.


--
-- Data for Name: PhoneInfo_phoneLanguage; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."PhoneInfo_phoneLanguage" (id, phoneinfo_id, languagesupport_id) FROM stdin;
80	33	1
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

COPY public."SaleOff" (id, "saleOffName", "saleOffPrice", "dateStart", "dateEnd", other, "productId") FROM stdin;
18	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	18
19	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1 6GB RAM 64GB	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	19
20	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Plus M1	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	20
6	Giảm giá bao ốp da khi mua điện thoại Iphone 6S 64GB cũ (99%)	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	7
5	Giảm giá bao ốp da khi mua điện thoại Iphone 7	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	6
3	Giảm giá bao ốp da khi mua điện thoại Iphone 8 Plus	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	4
4	Giảm giá bao ốp da khi mua điện thoại Iphone 8	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	5
7	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9	0	2018-11-12	2018-12-31	Giảm thêm 1.500.000đ qua Galaxy Gift	8
8	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A9	0	2018-11-12	2019-04-20	Tặng Loa Anker Soundcore Mini 2, PIN DỰ PHÒNG ENERGIZER 10000 MAH UE10012 ĐEN	8
9	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy A7	0.5	2018-11-12	2019-04-20	Tặng phiếu mua hàng 700.000đ	9
10	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy J6 Plus	0.299999999999999989	2018-11-12	2019-04-20	Tặng phiếu mua hàng 500.000đ	10
11	Giảm giá bao ốp da khi mua điện thoại Galaxy S8+	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	11
12	Giảm giá bao ốp da khi mua điện thoại Galaxy S9+	0	2018-11-12	2019-07-19	Tặng Màn hình máy tính Samsung 27' (C27F390FHE) trị giá 5.1 triệu đồng	12
13	Giảm giá bao ốp da khi mua điện thoại Samsung Galaxy S8 cũ	0	2018-11-12	2018-12-31	Giảm tới 1% giá hóa đơn, 10% giá bao da, ốp, miếng dán	13
14	Giảm giá bao ốp da khi mua điện thoại Redmi S2	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	14
15	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8 Lite	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	15
16	Giảm giá bao ốp da khi mua điện thoại Xiaomi Mi 8	0	2018-11-12	2019-07-19	Giảm 10% giá bao da, ốp, miếng dán	16
17	Giảm giá bao ốp da khi mua điện thoại ASUS ZenFone Max Pro M1	0	2018-11-12	2019-07-19	Tặng phiếu mua hàng 300.000đ, Giảm 10% giá bao da, ốp, miếng dán	17
1	Giảm giá điện thoại Iphone XS Max	2	2018-11-12	2019-01-30	Loa Bluetooth iCutes MB-M615 Mặt cười	1
2	Giảm giá bao ốp da khi mua điện thoại Iphone X	2	2018-11-12	2019-01-31	Giảm 10% giá bao da, ốp, miếng dán	3
\.


--
-- Data for Name: StoreInventory; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public."StoreInventory" (id, amount, "productId", "storeId") FROM stdin;
21	0	3	1
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
77	Can add day received phone	23	add_dayreceivedphone
78	Can change day received phone	23	change_dayreceivedphone
79	Can delete day received phone	23	delete_dayreceivedphone
80	Can view day received phone	23	view_dayreceivedphone
81	Can add buy and allow change	24	add_buyandallowchange
82	Can change buy and allow change	24	change_buyandallowchange
83	Can delete buy and allow change	24	delete_buyandallowchange
84	Can view buy and allow change	24	view_buyandallowchange
\.


--
-- Data for Name: auth_user; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.auth_user (id, password, last_login, is_superuser, username, first_name, last_name, email, is_staff, is_active, date_joined) FROM stdin;
1	pbkdf2_sha256$120000$8F1QhWa7bQgD$ibrR/c+1ki4lE37VaG/Gs0KnSx5uNzCwYdgcY9SzV3k=	2019-01-25 02:07:07.393233+07	t	congtran			cong@gmail.com	t	t	2018-11-12 21:54:08.12945+07
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
503	2019-01-21 14:51:12.081884+07	1	iPhone XS Max - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - date received: 2019-01-31	1	[{"added": {}}]	23	1
504	2019-01-21 16:35:30.530325+07	1	iPhone XS Max - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - received_date: 24-01-2019	2	[{"changed": {"fields": ["receivedDate"]}}]	23	1
505	2019-01-21 16:39:31.003102+07	1	iPhone XS Max - CellphoneS 125 Lê Văn Việt, P. Hiệp Phú, Q. 9 - received_date: 31-01-2019	2	[{"changed": {"fields": ["receivedDate"]}}]	23	1
506	2019-01-21 16:59:05.514228+07	1	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR - duration: 2019-01-21 - 2019-01-31 	1	[{"added": {}}]	24	1
507	2019-01-21 16:59:05.517233+07	2	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR - duration: 2019-01-21 - 2019-01-31 	1	[{"added": {}}]	24	1
508	2019-01-21 16:59:14.936786+07	1	CHƯƠNG TRÌNH THU CŨ ĐỔI MỚI iPhone XS / XS MAX / XR - duration: 2019-01-21 - 2019-01-31 	2	[{"changed": {"fields": ["productId"]}}]	24	1
509	2019-01-22 08:42:51.519601+07	1	iPhone XS Max - CellphoneS 4B Cộng Hoà, P. 4, Q. Tân Bình - received_date: 31-01-2019	2	[{"changed": {"fields": ["storeId"]}}]	23	1
510	2019-01-22 08:50:47.830327+07	33	iPhone XS Max - 256 GB - Vàng	1	[{"added": {}}]	14	1
511	2019-01-25 17:09:15.406326+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-26 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
512	2019-01-25 17:09:15.471141+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-26 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
513	2019-01-25 17:09:15.476721+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-26 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
514	2019-01-25 17:15:53.922626+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-23 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
515	2019-01-25 17:15:53.932959+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-23 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
516	2019-01-27 15:19:49.085541+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-30 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
517	2019-01-27 16:34:05.885468+07	1	Iphone X / Iphone XS Max feature	2	[{"changed": {"fields": ["game"]}}]	13	1
518	2019-01-27 16:35:26.835119+07	1	Giảm giá điện thoại Iphone XS Max - discount:3.0 - duration: 2018-11-12 - 2019-01-30 	2	[{"changed": {"fields": ["saleOffPrice"]}}]	17	1
519	2019-01-27 16:40:08.274538+07	1	Giảm giá điện thoại Iphone XS Max - discount:2.0 - duration: 2018-11-12 - 2019-01-30 	2	[{"changed": {"fields": ["saleOffPrice"]}}]	17	1
520	2019-01-28 15:12:27.097848+07	21	Iphone X - CellphoneS 672-674 Âu Cơ, P. 14, Q. Tân Bình - amount: 0	2	[{"changed": {"fields": ["amount"]}}]	19	1
521	2019-01-28 16:48:47.386554+07	2	Giảm giá bao ốp da khi mua điện thoại Iphone X - discount:0.0 - duration: 2018-11-12 - 2019-01-31 	2	[{"changed": {"fields": ["dateEnd"]}}]	17	1
522	2019-01-28 16:48:57.179715+07	2	Giảm giá bao ốp da khi mua điện thoại Iphone X - discount:2.0 - duration: 2018-11-12 - 2019-01-31 	2	[{"changed": {"fields": ["saleOffPrice"]}}]	17	1
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
7	database	category
8	database	guarantee
9	database	installment
10	database	languagesupport
11	database	manufacturer
12	database	phonecode
13	database	phonefeature
14	database	phoneinfo
15	database	post
16	database	product
17	database	saleoff
18	database	store
19	database	storeinventory
23	database	dayreceivedphone
24	database	buyandallowchange
\.


--
-- Data for Name: django_migrations; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_migrations (id, app, name, applied) FROM stdin;
1	contenttypes	0001_initial	2018-12-10 21:39:26.977343+07
2	auth	0001_initial	2018-12-10 21:39:27.049079+07
3	admin	0001_initial	2018-12-10 21:39:27.07639+07
4	admin	0002_logentry_remove_auto_add	2018-12-10 21:39:27.086938+07
5	admin	0003_logentry_add_action_flag_choices	2018-12-10 21:39:27.096102+07
6	contenttypes	0002_remove_content_type_name	2018-12-10 21:39:27.125461+07
7	auth	0002_alter_permission_name_max_length	2018-12-10 21:39:27.132064+07
8	auth	0003_alter_user_email_max_length	2018-12-10 21:39:27.144902+07
9	auth	0004_alter_user_username_opts	2018-12-10 21:39:27.155445+07
10	auth	0005_alter_user_last_login_null	2018-12-10 21:39:27.171001+07
11	auth	0006_require_contenttypes_0002	2018-12-10 21:39:27.173785+07
12	auth	0007_alter_validators_add_error_messages	2018-12-10 21:39:27.186018+07
13	auth	0008_alter_user_username_max_length	2018-12-10 21:39:27.200171+07
14	auth	0009_alter_user_last_name_max_length	2018-12-10 21:39:27.215032+07
15	database	0001_initial	2018-12-10 21:39:27.414089+07
16	sessions	0001_initial	2018-12-10 21:39:27.427177+07
32	database	0002_dayreceivedphone	2019-01-21 14:49:47.518668+07
33	database	0003_buyandallowchange	2019-01-21 16:56:19.927991+07
\.


--
-- Data for Name: django_session; Type: TABLE DATA; Schema: public; Owner: xeras
--

COPY public.django_session (session_key, session_data, expire_date) FROM stdin;
58cosgvlbk6agrjj4k8hxgvkxxkl0una	OWQ0YWMxNTIxODIyM2QxZWIzM2Q3ZTUzODkyMWM1ZmE1NjA2OGRhOTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI3MGQwMzY1N2RkN2Y2MDcxYWQyODgyN2I4ZWVlOTc4NTZhODJjZDBhIn0=	2018-11-27 10:13:11.872876+07
ed3wyhnrl8eeb75lvcjuejkk5imo8gii	OWQ0YWMxNTIxODIyM2QxZWIzM2Q3ZTUzODkyMWM1ZmE1NjA2OGRhOTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiI3MGQwMzY1N2RkN2Y2MDcxYWQyODgyN2I4ZWVlOTc4NTZhODJjZDBhIn0=	2018-12-11 21:22:41.700617+07
0kt9hbm1pucjbq22utdkjykav0mtanae	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-24 21:45:44.00581+07
ja463s9rwxbe7npmskpadcc30pjh5yjw	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:10:45.416878+07
ocn07mm181nso1g6zigo3r5bov8st6uf	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:25:19.477331+07
dk4b33op99b5y5z9uajxrgt8lt5soo8o	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:27:13.829452+07
lfnmr0wwdo1mes1r6ezbdhpaxespltqx	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:31:24.456734+07
sxd7j1v1bqjonr1oy0f2mpdgg5y1xo5w	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:32:48.424617+07
ty9h0ozfbez13wih3ane435fmitnvdir	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:56:06.72252+07
2jo8wkf34vsk6qb7ui6gphx1pztrnv6f	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-25 17:57:56.91276+07
qy7xakbikrmjizgilqcqq5kvtxtnf11i	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2018-12-29 00:12:33.069272+07
7ywvu1kfizotan8vxbeeo4ysn1p2vmbn	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-03 02:11:46.936238+07
fa2cbfvuezyehma44k7fnl36xxdfxudf	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-04 14:34:29.096093+07
hp8p6lirg47ozecl9lhodftzqfe67tyh	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-04 14:34:29.097649+07
vogis9h1q1q7jo5qrzkip2uok0f5bffh	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-05 08:15:37.840326+07
wlq6o8iiubthseiqxi3rxkyzaplpi69g	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-05 08:38:20.496681+07
bk7jf7gfhrbvxwj9lkafnimo4y9x5kc4	MDI0OGE5MmM5OGZkNTI0N2NjM2QzY2Y1YTU1OTI5NDI3YmI0YmQzNTp7Il9hdXRoX3VzZXJfaWQiOiIxIiwiX2F1dGhfdXNlcl9iYWNrZW5kIjoiZGphbmdvLmNvbnRyaWIuYXV0aC5iYWNrZW5kcy5Nb2RlbEJhY2tlbmQiLCJfYXV0aF91c2VyX2hhc2giOiIyZDNhMWZiOTIyYWQ3MzZiNTMyYzRlODVmMjI4ODE0NGU2ODNkMTQ5In0=	2019-02-08 02:07:07.403767+07
\.


--
-- Name: BuyAndAllowChange_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."BuyAndAllowChange_id_seq"', 2, true);


--
-- Name: Category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."Category_id_seq"', 8, true);


--
-- Name: DayReceivedPhone_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."DayReceivedPhone_id_seq"', 1, true);


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

SELECT pg_catalog.setval('public."PhoneInfo_id_seq"', 33, true);


--
-- Name: PhoneInfo_phoneLanguage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public."PhoneInfo_phoneLanguage_id_seq"', 80, true);


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

SELECT pg_catalog.setval('public.auth_permission_id_seq', 84, true);


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

SELECT pg_catalog.setval('public.django_admin_log_id_seq', 522, true);


--
-- Name: django_content_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_content_type_id_seq', 24, true);


--
-- Name: django_migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: xeras
--

SELECT pg_catalog.setval('public.django_migrations_id_seq', 33, true);


--
-- Name: BuyAndAllowChange BuyAndAllowChange_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."BuyAndAllowChange"
    ADD CONSTRAINT "BuyAndAllowChange_pkey" PRIMARY KEY (id);


--
-- Name: Category Category_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."Category"
    ADD CONSTRAINT "Category_pkey" PRIMARY KEY (id);


--
-- Name: DayReceivedPhone DayReceivedPhone_pkey; Type: CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."DayReceivedPhone"
    ADD CONSTRAINT "DayReceivedPhone_pkey" PRIMARY KEY (id);


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
-- Name: BuyAndAllowChange_productId_916b0bbf; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "BuyAndAllowChange_productId_916b0bbf" ON public."BuyAndAllowChange" USING btree ("productId");


--
-- Name: DayReceivedPhone_productId_62f83568; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "DayReceivedPhone_productId_62f83568" ON public."DayReceivedPhone" USING btree ("productId");


--
-- Name: DayReceivedPhone_storeId_5cf10068; Type: INDEX; Schema: public; Owner: xeras
--

CREATE INDEX "DayReceivedPhone_storeId_5cf10068" ON public."DayReceivedPhone" USING btree ("storeId");


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
-- Name: BuyAndAllowChange BuyAndAllowChange_productId_916b0bbf_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."BuyAndAllowChange"
    ADD CONSTRAINT "BuyAndAllowChange_productId_916b0bbf_fk_Product_id" FOREIGN KEY ("productId") REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: DayReceivedPhone DayReceivedPhone_productId_62f83568_fk_Product_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."DayReceivedPhone"
    ADD CONSTRAINT "DayReceivedPhone_productId_62f83568_fk_Product_id" FOREIGN KEY ("productId") REFERENCES public."Product"(id) DEFERRABLE INITIALLY DEFERRED;


--
-- Name: DayReceivedPhone DayReceivedPhone_storeId_5cf10068_fk_Store_CT_id; Type: FK CONSTRAINT; Schema: public; Owner: xeras
--

ALTER TABLE ONLY public."DayReceivedPhone"
    ADD CONSTRAINT "DayReceivedPhone_storeId_5cf10068_fk_Store_CT_id" FOREIGN KEY ("storeId") REFERENCES public."Store_CT"(id) DEFERRABLE INITIALLY DEFERRED;


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

