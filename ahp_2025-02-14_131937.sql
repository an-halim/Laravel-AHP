--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: alternatives; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alternatives (
    id integer NOT NULL,
    model character varying(255) NOT NULL,
    nama character varying(255) NOT NULL,
    harga numeric(10,2) NOT NULL,
    watt integer NOT NULL,
    kapasitas double precision NOT NULL,
    garansi character varying(255),
    keterangan character varying(255),
    gambar character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.alternatives OWNER TO postgres;

--
-- Name: alternatives_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alternatives_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alternatives_id_seq OWNER TO postgres;

--
-- Name: alternatives_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alternatives_id_seq OWNED BY public.alternatives.id;


--
-- Name: comparisons; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comparisons (
    id bigint NOT NULL,
    alternative_id bigint NOT NULL,
    sub_criteria_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.comparisons OWNER TO postgres;

--
-- Name: comparisons_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comparisons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comparisons_id_seq OWNER TO postgres;

--
-- Name: comparisons_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comparisons_id_seq OWNED BY public.comparisons.id;


--
-- Name: criterias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.criterias (
    id integer NOT NULL,
    code character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    deleted_at timestamp(0) without time zone
);


ALTER TABLE public.criterias OWNER TO postgres;

--
-- Name: criterias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.criterias_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.criterias_id_seq OWNER TO postgres;

--
-- Name: criterias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.criterias_id_seq OWNED BY public.criterias.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: hasils; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.hasils (
    id integer NOT NULL,
    model character varying(255) NOT NULL,
    nama character varying(255) NOT NULL,
    harga character varying(255) NOT NULL,
    watt character varying(255) NOT NULL,
    kapasitas character varying(255) NOT NULL,
    garansi character varying(255) NOT NULL,
    gambar character varying(255) NOT NULL,
    ahp double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    user_result_id bigint
);


ALTER TABLE public.hasils OWNER TO postgres;

--
-- Name: hasils_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.hasils_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hasils_id_seq OWNER TO postgres;

--
-- Name: hasils_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.hasils_id_seq OWNED BY public.hasils.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- Name: sub_criterias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sub_criterias (
    id bigint NOT NULL,
    criteria_id bigint NOT NULL,
    code character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    value character varying(255) NOT NULL,
    operator character varying(255) NOT NULL,
    weight double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sub_criterias OWNER TO postgres;

--
-- Name: sub_criterias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sub_criterias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sub_criterias_id_seq OWNER TO postgres;

--
-- Name: sub_criterias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sub_criterias_id_seq OWNED BY public.sub_criterias.id;


--
-- Name: user_results; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.user_results (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.user_results OWNER TO postgres;

--
-- Name: user_results_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_results_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_results_id_seq OWNER TO postgres;

--
-- Name: user_results_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.user_results_id_seq OWNED BY public.user_results.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    role character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: alternatives id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alternatives ALTER COLUMN id SET DEFAULT nextval('public.alternatives_id_seq'::regclass);


--
-- Name: comparisons id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comparisons ALTER COLUMN id SET DEFAULT nextval('public.comparisons_id_seq'::regclass);


--
-- Name: criterias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.criterias ALTER COLUMN id SET DEFAULT nextval('public.criterias_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: hasils id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hasils ALTER COLUMN id SET DEFAULT nextval('public.hasils_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: sub_criterias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_criterias ALTER COLUMN id SET DEFAULT nextval('public.sub_criterias_id_seq'::regclass);


--
-- Name: user_results id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_results ALTER COLUMN id SET DEFAULT nextval('public.user_results_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: alternatives; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alternatives (id, model, nama, harga, watt, kapasitas, garansi, keterangan, gambar, created_at, updated_at, deleted_at) FROM stdin;
1	RC50M - BE01A	Gaboor	250000.00	400	2.2	3	\N	Gaboor_RC50M - BE01A.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
2	HD3115	Philips	500000.00	400	1.8	5	\N	Philips_HD3115.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
3	SR-CEZ18	Panasonic	700000.00	350	1.8	4	\N	Panasonic_SR-CEZ18.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
4	CRJ-6601	Cosmos	350000.00	300	1.2	3	\N	Cosmos_CRJ-6601.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
5	KS-T18TL	Sharp	850000.00	360	2	6	\N	Sharp_KS-T18TL.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
6	NS-ZLH18	Zojirushi	1200000.00	500	1.8	7	\N	Zojirushi_NS-ZLH18.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
7	MC-3900	Yong Ma	600000.00	310	1.5	4	\N	Yong Ma_MC-3900.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
8	MB-FS5017	Midea	750000.00	420	2	5	\N	Midea_MB-FS5017.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
9	RC-18NT	Toshiba	900000.00	370	1.8	6	\N	Toshiba_RC-18NT.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
10	ERC6503W	Electrolux	1100000.00	440	1.8	6	\N	Electrolux_ERC6503W.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
11	MT-99E	Maimete 	200000.00	200	1.5	2	\N	Maimete _MT-99E.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
12	SJ-150	Sanken	507000.00	350	1.2	5	\N	Sanken_SJ-150.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
13	SJ-2200	Sanken	558000.00	350	2	5	\N	Sanken_SJ-2200.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
14	SJ-120SP	Sanken	414000.00	300	1	3	\N	Sanken_SJ-120SP.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
15	SJ-2060	Sanken	490000.00	350	1.8	4	\N	Sanken_SJ-2060.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
16	SJ-1999	Sanken	630000.00	350	1.8	5	\N	Sanken_SJ-1999.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
17	SJ-3000	Sanken	669000.00	350	2	6	\N	Sanken_SJ-3000.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
18	MCM-612	Miyako	226500.00	365	1.2	4	\N	Miyako_MCM-612.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
19	MCM-528	Miyako	227000.00	395	1.8	5	\N	Miyako_MCM-528.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
20	MCM-606A	Miyako	199500.00	300	1.8	2	\N	Miyako_MCM-606A.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
21	MCM-508 SBC	Miyako	228000.00	395	1.8	3	\N	Miyako_MCM-508 SBC.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
22	SJ-2000	Sanken	450000.00	300	1.5	4	\N	Sanken_SJ-2000.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
23	RZ-D18F	Hitachi	1000000.00	600	1.8	8	\N	Hitachi_RZ-D18F.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
24	MRJ-180	Maspion	350000.00	280	1.8	3	\N	Maspion_MRJ-180.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
25	OX-200	Oxone	1300000.00	500	2	6	\N	Oxone_OX-200.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
26	KRC-389	Kirin	500000.00	380	1.8	5	\N	Kirin_KRC-389.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
27	RC650	Black & Decker	900000.00	440	1.8	6	\N	Black & Decker_RC650.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
28	CR 1500	Modena	1500000.00	480	2	7	\N	Modena_CR 1500.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
29	JNP-1800	Tiger	1700000.00	600	1.8	8	\N	Tiger_JNP-1800.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
30	Joy Rice Cooker	Pigeon	400000.00	350	1.2	3	\N	Pigeon_Joy Rice Cooker.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
31	RK1028	Tefal	950000.00	420	1.8	6	\N	Tefal_RK1028.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
32	SC-28B	Denpoo	350.00	400	1.8	3	\N	Denpoo_SC-28B.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
33	SRC-520	National	375.00	380	2	4	\N	National_SRC-520.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
34	NS-ZCC18	Zojirushi	2100000.00	650	1.8	8	\N	Zojirushi_NS-ZCC18.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
35	MB-FS5015	Midea	650.00	500	1.5	5	\N	Midea_MB-FS5015.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
36	HD3132	Philips	1150000.00	450	2	7	\N	Philips_HD3132.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
37	SR-ZX105	Panasonic	2000000.00	580	1.5	8	\N	Panasonic_SR-ZX105.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
38	ERC3505	Electrolux	850.00	430	1.8	6	\N	Electrolux_ERC3505.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
39	RH-21210	Russell Hobbs	1400000.00	500	1.8	7	\N	Russell Hobbs_RH-21210.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
40	RC-5SLN	Toshiba	1100000.00	400	1	6	\N	Toshiba_RC-5SLN.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
41	JBV-S10U	Tiger	1500000.00	450	1.8	7	\N	Tiger_JBV-S10U.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
42	MC-3500	Yong Ma	750.00	460	2	6	\N	Yong Ma_MC-3500.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
43	HD3129	Philips	900.00	500	2.2	6	\N	Philips_HD3129.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
44	KS-N18MG	Sharp	500.00	420	1.8	5	\N	Sharp_KS-N18MG.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
45	SR-TEM18	Panasonic	1050000.00	450	1.8	7	\N	Panasonic_SR-TEM18.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
46	MB-FS5018	Midea	770.00	400	2	5	\N	Midea_MB-FS5018.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
47	RK5001	Tefal	1250000.00	530	1.8	7	\N	Tefal_RK5001.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
48	SJ-5000	Sanken	430.00	380	1.5	4	\N	Sanken_SJ-5000.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
49	OX-214	Oxone	1150000.00	520	2	6	\N	Oxone_OX-214.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
50	KRC-390	Kirin	550.00	390	1.8	5	\N	Kirin_KRC-390.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
51	SC-28B Digital	Denpoo	480.00	400	1.8	4	\N	Denpoo_SC-28B Digital.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
52	SRC-660	National	390.00	370	1.5	4	\N	National_SRC-660.jpg	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
53	CH-200	Mitochiba	520.00	360	2	5	\N	Mitochiba_CH-200.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
54	RC-18	Ichiko	450.00	350	1.8	4	\N	Ichiko_RC-18.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
55	IL-213	Idealife	630.00	450	2.2	6	\N	Idealife_IL-213.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
56	ARC-180	Advance	400.00	380	1.5	4	\N	Advance_ARC-180.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
57	SJ-300	Sanken	470.00	390	1.8	4	\N	Sanken_SJ-300.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
58	OX-316	Oxone	1250000.00	550	2	7	\N	Oxone_OX-316.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
59	RK1045	Tefal	1000000.00	530	1.8	6	\N	Tefal_RK1045.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
60	PRC-501	Polytron	400.00	380	1.8	5	\N	Polytron_PRC-501.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
61	Super Cook	BOLDe	350.00	400	1.2	4	\N	BOLDe_Super Cook.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
62	CRJ-3301	Cosmos	370.00	390	1.8	5	\N	Cosmos_CRJ-3301.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
63	OX-202	Oxone	450.00	420	1.8	5	\N	Oxone_OX-202.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
64	MRJ-208	Maspion	325.00	360	1.5	4	\N	Maspion_MRJ-208.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
65	R2	Mito	320.00	380	1.8	3	\N	Mito_R2.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
66	HD3132/33	Philips	1000000.00	400	2	7	\N	Philips_HD3132/33.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
67	MCM-609	Miyako	285.00	330	1.2	3	\N	Miyako_MCM-609.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
68	KSR19ST	Sharp	550.00	400	1.8	5	\N	Sharp_KSR19ST.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
69	IL-210S	Idealife	330.00	370	1.5	4	\N	Idealife_IL-210S.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
70	Super Cook Plus	Bolde	280.00	350	1.2	3	\N	Bolde_Super Cook Plus.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
71	CRL 1500	Turbo	800.00	500	1.8	6	\N	Turbo_CRL 1500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
72	MC-1500	Yong Ma	700.00	430	1.8	5	\N	Yong Ma_MC-1500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
73	SJ-130	Sanken	310.00	340	1.2	4	\N	Sanken_SJ-130.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
74	HD3119/33	Philips	950.00	450	1.8	6	\N	Philips_HD3119/33.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
75	CH-500	Mitochiba	370.00	390	1.5	5	\N	Mitochiba_CH-500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
76	CRJ-6606	Cosmos	450.00	420	1.8	5	\N	Cosmos_CRJ-6606.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
77	PRC-1901	Polytron	550.00	400	1.8	5	\N	Polytron_PRC-1901.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
78	SC-23D	Denpoo	270.00	300	1.8	3	\N	Denpoo_SC-23D.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
79	CRJ-323	Cosmos	370.00	390	1.5	4	\N	Cosmos_CRJ-323.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
80	MRJ-205	Maspion	420.00	360	1.8	5	\N	Maspion_MRJ-205.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
81	OX-203	Oxone	430.00	400	2	4	\N	Oxone_OX-203.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
82	Super Cook Pro	BOLDe	340.00	350	1.5	3	\N	BOLDe_Super Cook Pro.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
83	R5	Mito	410.00	370	1.8	4	\N	Mito_R5.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
84	HD3115/33	Philips	980.00	420	2	6	\N	Philips_HD3115/33.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
85	SR-GA421	Panasonic	1250000.00	520	2.2	8	\N	Panasonic_SR-GA421.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
86	KS-TH18	Sharp	700.00	460	1.8	5	\N	Sharp_KS-TH18.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
87	CRL 500	Turbo	750.00	450	2	6	\N	Turbo_CRL 500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
88	MC-3500D	Yong Ma	880.00	420	2	6	\N	Yong Ma_MC-3500D.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
89	SJ-450	Sanken	290.00	380	1.2	3	\N	Sanken_SJ-450.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
90	MCM-508	Miyako	325.00	320	1.2	3	\N	Miyako_MCM-508.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
91	SRC-560	National	400.00	370	1.5	4	\N	National_SRC-560.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
92	CH-500B	Mitochiba	360.00	380	1.5	4	\N	Mitochiba_CH-500B.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
93	RK1041	Tefal	1100000.00	450	1.8	7	\N	Tefal_RK1041.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
94	RH-21210-D	Russell Hobbs	1500000.00	480	1.8	7	\N	Russell Hobbs_RH-21210-D.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
95	NS-RPC10	Zojirushi	2300000.00	490	1.5	8	\N	Zojirushi_NS-RPC10.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
96	IL-208	Idealife	280.00	350	1.2	3	\N	Idealife_IL-208.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
97	CRJ-2801	Cosmos	450.00	410	1.8	5	\N	Cosmos_CRJ-2801.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
98	KSR 23ST	Sharp	575.00	420	1.8	5	\N	Sharp_KSR 23ST.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
99	KRC-120	Kirin	450.00	380	1.8	4	\N	Kirin_KRC-120.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
100	HD3128	Philips	950.00	430	2	6	\N	Philips_HD3128.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
101	SR-DF181	Panasonic	1300000.00	500	1.8	7	\N	Panasonic_SR-DF181.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
102	ERC-2205	Electrolux	850.00	430	1.8	6	\N	Electrolux_ERC-2205.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
103	OX-350	Oxone	1150000.00	510	2	6	\N	Oxone_OX-350.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
104	SC-37A	Denpoo	375.00	400	1.8	3	\N	Denpoo_SC-37A.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
105	SJ-330	Sanken	510.00	420	1.8	4	\N	Sanken_SJ-330.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
106	R3	Mito	310.00	330	1.2	3	\N	Mito_R3.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
107	MC-4500D	Yong Ma	890.00	460	2.2	6	\N	Yong Ma_MC-4500D.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
108	CRJ-2501	Cosmos	480.00	400	1.8	5	\N	Cosmos_CRJ-2501.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
109	CRL-505	Turbo	775.00	450	1.8	6	\N	Turbo_CRL-505.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
110	Crystal Cook	BOLDe	320.00	350	1.5	3	\N	BOLDe_Crystal Cook.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
111	PRC-125	Polytron	425.00	380	1.8	4	\N	Polytron_PRC-125.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
112	CH-300	Mitochiba	335.00	370	1.5	4	\N	Mitochiba_CH-300.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
113	HD3126/33	Philips	920.00	410	1.8	6	\N	Philips_HD3126/33.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
114	NP-NVC18	Zojirushi	2500000.00	650	1.8	10	\N	Zojirushi_NP-NVC18.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
115	SR-CN108	Panasonic	1200000.00	480	1.5	7	\N	Panasonic_SR-CN108.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
116	JAX-R10U	Tiger	1550000.00	460	1	8	\N	Tiger_JAX-R10U.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
117	RK812	Tefal	1350000.00	500	1.8	7	\N	Tefal_RK812.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
118	KRC-115	Kirin	365.00	350	1.5	4	\N	Kirin_KRC-115.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
119	SRC-880	National	410.00	380	1.8	5	\N	National_SRC-880.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
120	SC-39C	Denpoo	390.00	400	1.8	4	\N	Denpoo_SC-39C.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
121	KSR 31ST	Sharp	580.00	430	1.8	5	\N	Sharp_KSR 31ST.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
122	OX-460	Oxone	1300000.00	510	2	7	\N	Oxone_OX-460.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
123	CRJ-5001	Cosmos	510.00	400	1.8	5	\N	Cosmos_CRJ-5001.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
124	PSG-705	Miyako	340.00	370	1.2	3	\N	Miyako_PSG-705.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
125	SJ-900	Sanken	470.00	450	1.5	5	\N	Sanken_SJ-900.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
126	MC-4500	Yong Ma	920.00	420	1.8	6	\N	Yong Ma_MC-4500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
127	Super Eco Cook	BOLDe	340.00	390	1.5	4	\N	BOLDe_Super Eco Cook.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
128	R6	Mito	315.00	350	1.2	3	\N	Mito_R6.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
129	SR-JQ105	Panasonic	1100000.00	460	1	7	\N	Panasonic_SR-JQ105.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
130	HD3038	Philips	1350000.00	600	2	6	\N	Philips_HD3038.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
131	SC-21	Denpoo	290.00	320	1.2	3	\N	Denpoo_SC-21.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
132	CRJ-2038	Cosmos	480.00	400	2	5	\N	Cosmos_CRJ-2038.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
133	OX-253	Oxone	1200000.00	510	1.8	6	\N	Oxone_OX-253.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
134	NP-HBC10	Zojirushi	2500000.00	500	1	10	\N	Zojirushi_NP-HBC10.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
135	PSG-607	Miyako	310.00	350	1.5	3	\N	Miyako_PSG-607.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
136	CRL 300	Turbo	710.00	450	1.8	5	\N	Turbo_CRL 300.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
137	SJ-130D	Sanken	520.00	410	1.8	5	\N	Sanken_SJ-130D.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
138	PRC-121	Polytron	450.00	390	1.8	4	\N	Polytron_PRC-121.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
139	KS-N18IH	Sharp	1600000.00	550	1.8	8	\N	Sharp_KS-N18IH.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
140	IL-217	Idealife	300.00	370	1.5	3	\N	Idealife_IL-217.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
141	SR-DF181W	Panasonic	1250000.00	460	1.8	7	\N	Panasonic_SR-DF181W.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
142	RH-22700-56	Russell Hobbs	1550000.00	480	2	8	\N	Russell Hobbs_RH-22700-56.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
143	CRJ-2201	Cosmos	370.00	380	1.8	4	\N	Cosmos_CRJ-2201.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
144	SJ-200	Sanken	390.00	390	1.8	4	\N	Sanken_SJ-200.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
145	KRC-126	Kirin	390.00	380	1.2	4	\N	Kirin_KRC-126.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
146	MRJ-197	Maspion	330.00	350	1.5	3	\N	Maspion_MRJ-197.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
147	Super Deluxe Cook	BOLDe	340.00	350	1.8	4	\N	BOLDe_Super Deluxe Cook.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
148	OX-456	Oxone	1100000.00	470	1.5	6	\N	Oxone_OX-456.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
149	NS-TSQ10	Zojirushi	2200000.00	430	1	8	\N	Zojirushi_NS-TSQ10.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
150	JKT-S10U	Tiger	1600000.00	470	1	7	\N	Tiger_JKT-S10U.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
151	ERC-2403	Electrolux	790.00	440	1.8	6	\N	Electrolux_ERC-2403.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
152	HD3030/30	Philips	1150000.00	460	1.5	6	\N	Philips_HD3030/30.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
153	PSG-605	Miyako	305.00	360	1.2	3	\N	Miyako_PSG-605.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
154	KSR19SN	Sharp	500.00	420	1.8	5	\N	Sharp_KSR19SN.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
155	IL-213	Idealife	280.00	350	1.5	3	\N	Idealife_IL-213.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
156	SR-ZX185W	Panasonic	1350000.00	450	1.8	8	\N	Panasonic_SR-ZX185W.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
157	MC-2500	Yong Ma	700.00	410	1.8	6	\N	Yong Ma_MC-2500.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
158	SRC-900	National	460.00	400	1.5	5	\N	National_SRC-900.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
159	CRJ-2002	Cosmos	420.00	380	1.8	4	\N	Cosmos_CRJ-2002.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
160	R7	Mito	330.00	370	1.8	3	\N	Mito_R7.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
161	RK202	Tefal	1100000.00	450	1.8	6	\N	Tefal_RK202.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
162	CRL 600	Turbo	830.00	500	2	6	\N	Turbo_CRL 600.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
163	NS-ZCC18	Zojirushi	2100000.00	450	1.8	10	\N	Zojirushi_NS-ZCC18.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
164	RH-23520	Russell Hobbs	1450000.00	460	1.5	8	\N	Russell Hobbs_RH-23520.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
165	SC-24	Denpoo	295.00	320	1.2	3	\N	Denpoo_SC-24.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
166	PRC-123	Polytron	380.00	380	1.5	4	\N	Polytron_PRC-123.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
167	KRC-120SS	Kirin	420.00	370	1.8	5	\N	Kirin_KRC-120SS.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
168	CRJ-328	Cosmos	450.00	410	1.8	4	\N	Cosmos_CRJ-328.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
169	MRJ-228	Maspion	365.00	360	1.2	4	\N	Maspion_MRJ-228.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
170	IL-214	Idealife	270.00	350	1.5	3	\N	Idealife_IL-214.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
171	SR-ZX205	Panasonic	1150000.00	450	2	8	\N	Panasonic_SR-ZX205.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
172	HD3127	Philips	900.00	410	1.8	5	\N	Philips_HD3127.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
173	CRL 800	Turbo	950.00	500	1.8	6	\N	Turbo_CRL 800.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
174	OX-355	Oxone	1250000.00	510	1.8	7	\N	Oxone_OX-355.jpg	2025-01-19 06:43:35	2025-01-19 06:43:35	\N
\.


--
-- Data for Name: comparisons; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comparisons (id, alternative_id, sub_criteria_id, created_at, updated_at) FROM stdin;
1	1	9	\N	\N
2	1	3	\N	\N
3	1	6	\N	\N
4	1	12	\N	\N
5	2	9	\N	\N
6	2	3	\N	\N
7	2	6	\N	\N
8	2	11	\N	\N
9	3	9	\N	\N
10	3	3	\N	\N
11	3	6	\N	\N
12	3	11	\N	\N
13	4	9	\N	\N
14	4	3	\N	\N
15	4	6	\N	\N
16	4	11	\N	\N
17	5	9	\N	\N
18	5	3	\N	\N
19	5	6	\N	\N
20	5	11	\N	\N
21	6	9	\N	\N
22	6	3	\N	\N
23	6	6	\N	\N
24	6	11	\N	\N
25	7	9	\N	\N
26	7	3	\N	\N
27	7	6	\N	\N
28	7	11	\N	\N
29	8	9	\N	\N
30	8	3	\N	\N
31	8	6	\N	\N
32	8	11	\N	\N
33	9	9	\N	\N
34	9	3	\N	\N
35	9	6	\N	\N
36	9	11	\N	\N
37	10	9	\N	\N
38	10	3	\N	\N
39	10	6	\N	\N
40	10	11	\N	\N
41	11	9	\N	\N
42	11	2	\N	\N
43	11	5	\N	\N
44	11	11	\N	\N
45	12	9	\N	\N
46	12	3	\N	\N
47	12	6	\N	\N
48	12	11	\N	\N
49	13	9	\N	\N
50	13	3	\N	\N
51	13	6	\N	\N
52	13	11	\N	\N
53	14	9	\N	\N
54	14	3	\N	\N
55	14	6	\N	\N
56	14	10	\N	\N
57	15	9	\N	\N
58	15	3	\N	\N
59	15	6	\N	\N
60	15	11	\N	\N
61	16	9	\N	\N
62	16	3	\N	\N
63	16	6	\N	\N
64	16	11	\N	\N
65	17	9	\N	\N
66	17	3	\N	\N
67	17	6	\N	\N
68	17	11	\N	\N
69	18	9	\N	\N
70	18	3	\N	\N
71	18	6	\N	\N
72	18	11	\N	\N
73	19	9	\N	\N
74	19	3	\N	\N
75	19	6	\N	\N
76	19	11	\N	\N
77	20	9	\N	\N
78	20	2	\N	\N
79	20	6	\N	\N
80	20	11	\N	\N
81	21	9	\N	\N
82	21	3	\N	\N
83	21	6	\N	\N
84	21	11	\N	\N
85	22	9	\N	\N
86	22	3	\N	\N
87	22	6	\N	\N
88	22	11	\N	\N
89	23	9	\N	\N
90	23	3	\N	\N
91	23	6	\N	\N
92	23	11	\N	\N
93	24	9	\N	\N
94	24	3	\N	\N
95	24	6	\N	\N
96	24	11	\N	\N
97	25	9	\N	\N
98	25	3	\N	\N
99	25	6	\N	\N
100	25	11	\N	\N
101	26	9	\N	\N
102	26	3	\N	\N
103	26	6	\N	\N
104	26	11	\N	\N
105	27	9	\N	\N
106	27	3	\N	\N
107	27	6	\N	\N
108	27	11	\N	\N
109	28	9	\N	\N
110	28	3	\N	\N
111	28	6	\N	\N
112	28	11	\N	\N
113	29	9	\N	\N
114	29	3	\N	\N
115	29	6	\N	\N
116	29	11	\N	\N
117	30	9	\N	\N
118	30	3	\N	\N
119	30	6	\N	\N
120	30	11	\N	\N
121	31	9	\N	\N
122	31	3	\N	\N
123	31	6	\N	\N
124	31	11	\N	\N
125	32	7	\N	\N
126	32	3	\N	\N
127	32	6	\N	\N
128	32	11	\N	\N
129	33	7	\N	\N
130	33	3	\N	\N
131	33	6	\N	\N
132	33	11	\N	\N
133	34	9	\N	\N
134	34	3	\N	\N
135	34	6	\N	\N
136	34	11	\N	\N
137	35	7	\N	\N
138	35	3	\N	\N
139	35	6	\N	\N
140	35	11	\N	\N
141	36	9	\N	\N
142	36	3	\N	\N
143	36	6	\N	\N
144	36	11	\N	\N
145	37	9	\N	\N
146	37	3	\N	\N
147	37	6	\N	\N
148	37	11	\N	\N
149	38	7	\N	\N
150	38	3	\N	\N
151	38	6	\N	\N
152	38	11	\N	\N
153	39	9	\N	\N
154	39	3	\N	\N
155	39	6	\N	\N
156	39	11	\N	\N
157	40	9	\N	\N
158	40	3	\N	\N
159	40	6	\N	\N
160	40	10	\N	\N
161	41	9	\N	\N
162	41	3	\N	\N
163	41	6	\N	\N
164	41	11	\N	\N
165	42	7	\N	\N
166	42	3	\N	\N
167	42	6	\N	\N
168	42	11	\N	\N
169	43	7	\N	\N
170	43	3	\N	\N
171	43	6	\N	\N
172	43	12	\N	\N
173	44	7	\N	\N
174	44	3	\N	\N
175	44	6	\N	\N
176	44	11	\N	\N
177	45	9	\N	\N
178	45	3	\N	\N
179	45	6	\N	\N
180	45	11	\N	\N
181	46	7	\N	\N
182	46	3	\N	\N
183	46	6	\N	\N
184	46	11	\N	\N
185	47	9	\N	\N
186	47	3	\N	\N
187	47	6	\N	\N
188	47	11	\N	\N
189	48	7	\N	\N
190	48	3	\N	\N
191	48	6	\N	\N
192	48	11	\N	\N
193	49	9	\N	\N
194	49	3	\N	\N
195	49	6	\N	\N
196	49	11	\N	\N
197	50	7	\N	\N
198	50	3	\N	\N
199	50	6	\N	\N
200	50	11	\N	\N
201	51	7	\N	\N
202	51	3	\N	\N
203	51	6	\N	\N
204	51	11	\N	\N
205	52	7	\N	\N
206	52	3	\N	\N
207	52	6	\N	\N
208	52	11	\N	\N
209	53	7	\N	\N
210	53	3	\N	\N
211	53	6	\N	\N
212	53	11	\N	\N
213	54	7	\N	\N
214	54	3	\N	\N
215	54	6	\N	\N
216	54	11	\N	\N
217	55	7	\N	\N
218	55	3	\N	\N
219	55	6	\N	\N
220	55	12	\N	\N
221	56	7	\N	\N
222	56	3	\N	\N
223	56	6	\N	\N
224	56	11	\N	\N
225	57	7	\N	\N
226	57	3	\N	\N
227	57	6	\N	\N
228	57	11	\N	\N
229	58	9	\N	\N
230	58	3	\N	\N
231	58	6	\N	\N
232	58	11	\N	\N
233	59	9	\N	\N
234	59	3	\N	\N
235	59	6	\N	\N
236	59	11	\N	\N
237	60	7	\N	\N
238	60	3	\N	\N
239	60	6	\N	\N
240	60	11	\N	\N
241	61	7	\N	\N
242	61	3	\N	\N
243	61	6	\N	\N
244	61	11	\N	\N
245	62	7	\N	\N
246	62	3	\N	\N
247	62	6	\N	\N
248	62	11	\N	\N
249	63	7	\N	\N
250	63	3	\N	\N
251	63	6	\N	\N
252	63	11	\N	\N
253	64	7	\N	\N
254	64	3	\N	\N
255	64	6	\N	\N
256	64	11	\N	\N
257	65	7	\N	\N
258	65	3	\N	\N
259	65	6	\N	\N
260	65	11	\N	\N
261	66	9	\N	\N
262	66	3	\N	\N
263	66	6	\N	\N
264	66	11	\N	\N
265	67	7	\N	\N
266	67	3	\N	\N
267	67	6	\N	\N
268	67	11	\N	\N
269	68	7	\N	\N
270	68	3	\N	\N
271	68	6	\N	\N
272	68	11	\N	\N
273	69	7	\N	\N
274	69	3	\N	\N
275	69	6	\N	\N
276	69	11	\N	\N
277	70	7	\N	\N
278	70	3	\N	\N
279	70	6	\N	\N
280	70	11	\N	\N
281	71	7	\N	\N
282	71	3	\N	\N
283	71	6	\N	\N
284	71	11	\N	\N
285	72	7	\N	\N
286	72	3	\N	\N
287	72	6	\N	\N
288	72	11	\N	\N
289	73	7	\N	\N
290	73	3	\N	\N
291	73	6	\N	\N
292	73	11	\N	\N
293	74	7	\N	\N
294	74	3	\N	\N
295	74	6	\N	\N
296	74	11	\N	\N
297	75	7	\N	\N
298	75	3	\N	\N
299	75	6	\N	\N
300	75	11	\N	\N
301	76	7	\N	\N
302	76	3	\N	\N
303	76	6	\N	\N
304	76	11	\N	\N
305	77	7	\N	\N
306	77	3	\N	\N
307	77	6	\N	\N
308	77	11	\N	\N
309	78	7	\N	\N
310	78	3	\N	\N
311	78	6	\N	\N
312	78	11	\N	\N
313	79	7	\N	\N
314	79	3	\N	\N
315	79	6	\N	\N
316	79	11	\N	\N
317	80	7	\N	\N
318	80	3	\N	\N
319	80	6	\N	\N
320	80	11	\N	\N
321	81	7	\N	\N
322	81	3	\N	\N
323	81	6	\N	\N
324	81	11	\N	\N
325	82	7	\N	\N
326	82	3	\N	\N
327	82	6	\N	\N
328	82	11	\N	\N
329	83	7	\N	\N
330	83	3	\N	\N
331	83	6	\N	\N
332	83	11	\N	\N
333	84	7	\N	\N
334	84	3	\N	\N
335	84	6	\N	\N
336	84	11	\N	\N
337	85	9	\N	\N
338	85	3	\N	\N
339	85	6	\N	\N
340	85	12	\N	\N
341	86	7	\N	\N
342	86	3	\N	\N
343	86	6	\N	\N
344	86	11	\N	\N
345	87	7	\N	\N
346	87	3	\N	\N
347	87	6	\N	\N
348	87	11	\N	\N
349	88	7	\N	\N
350	88	3	\N	\N
351	88	6	\N	\N
352	88	11	\N	\N
353	89	7	\N	\N
354	89	3	\N	\N
355	89	6	\N	\N
356	89	11	\N	\N
357	90	7	\N	\N
358	90	3	\N	\N
359	90	6	\N	\N
360	90	11	\N	\N
361	91	7	\N	\N
362	91	3	\N	\N
363	91	6	\N	\N
364	91	11	\N	\N
365	92	7	\N	\N
366	92	3	\N	\N
367	92	6	\N	\N
368	92	11	\N	\N
369	93	9	\N	\N
370	93	3	\N	\N
371	93	6	\N	\N
372	93	11	\N	\N
373	94	9	\N	\N
374	94	3	\N	\N
375	94	6	\N	\N
376	94	11	\N	\N
377	95	9	\N	\N
378	95	3	\N	\N
379	95	6	\N	\N
380	95	11	\N	\N
381	96	7	\N	\N
382	96	3	\N	\N
383	96	6	\N	\N
384	96	11	\N	\N
385	97	7	\N	\N
386	97	3	\N	\N
387	97	6	\N	\N
388	97	11	\N	\N
389	98	7	\N	\N
390	98	3	\N	\N
391	98	6	\N	\N
392	98	11	\N	\N
393	99	7	\N	\N
394	99	3	\N	\N
395	99	6	\N	\N
396	99	11	\N	\N
397	100	7	\N	\N
398	100	3	\N	\N
399	100	6	\N	\N
400	100	11	\N	\N
401	101	9	\N	\N
402	101	3	\N	\N
403	101	6	\N	\N
404	101	11	\N	\N
405	102	7	\N	\N
406	102	3	\N	\N
407	102	6	\N	\N
408	102	11	\N	\N
409	103	9	\N	\N
410	103	3	\N	\N
411	103	6	\N	\N
412	103	11	\N	\N
413	104	7	\N	\N
414	104	3	\N	\N
415	104	6	\N	\N
416	104	11	\N	\N
417	105	7	\N	\N
418	105	3	\N	\N
419	105	6	\N	\N
420	105	11	\N	\N
421	106	7	\N	\N
422	106	3	\N	\N
423	106	6	\N	\N
424	106	11	\N	\N
425	107	7	\N	\N
426	107	3	\N	\N
427	107	6	\N	\N
428	107	12	\N	\N
429	108	7	\N	\N
430	108	3	\N	\N
431	108	6	\N	\N
432	108	11	\N	\N
433	109	7	\N	\N
434	109	3	\N	\N
435	109	6	\N	\N
436	109	11	\N	\N
437	110	7	\N	\N
438	110	3	\N	\N
439	110	6	\N	\N
440	110	11	\N	\N
441	111	7	\N	\N
442	111	3	\N	\N
443	111	6	\N	\N
444	111	11	\N	\N
445	112	7	\N	\N
446	112	3	\N	\N
447	112	6	\N	\N
448	112	11	\N	\N
449	113	7	\N	\N
450	113	3	\N	\N
451	113	6	\N	\N
452	113	11	\N	\N
453	114	9	\N	\N
454	114	3	\N	\N
455	114	6	\N	\N
456	114	11	\N	\N
457	115	9	\N	\N
458	115	3	\N	\N
459	115	6	\N	\N
460	115	11	\N	\N
461	116	9	\N	\N
462	116	3	\N	\N
463	116	6	\N	\N
464	116	10	\N	\N
465	117	9	\N	\N
466	117	3	\N	\N
467	117	6	\N	\N
468	117	11	\N	\N
469	118	7	\N	\N
470	118	3	\N	\N
471	118	6	\N	\N
472	118	11	\N	\N
473	119	7	\N	\N
474	119	3	\N	\N
475	119	6	\N	\N
476	119	11	\N	\N
477	120	7	\N	\N
478	120	3	\N	\N
479	120	6	\N	\N
480	120	11	\N	\N
481	121	7	\N	\N
482	121	3	\N	\N
483	121	6	\N	\N
484	121	11	\N	\N
485	122	9	\N	\N
486	122	3	\N	\N
487	122	6	\N	\N
488	122	11	\N	\N
489	123	7	\N	\N
490	123	3	\N	\N
491	123	6	\N	\N
492	123	11	\N	\N
493	124	7	\N	\N
494	124	3	\N	\N
495	124	6	\N	\N
496	124	11	\N	\N
497	125	7	\N	\N
498	125	3	\N	\N
499	125	6	\N	\N
500	125	11	\N	\N
501	126	7	\N	\N
502	126	3	\N	\N
503	126	6	\N	\N
504	126	11	\N	\N
505	127	7	\N	\N
506	127	3	\N	\N
507	127	6	\N	\N
508	127	11	\N	\N
509	128	7	\N	\N
510	128	3	\N	\N
511	128	6	\N	\N
512	128	11	\N	\N
513	129	9	\N	\N
514	129	3	\N	\N
515	129	6	\N	\N
516	129	10	\N	\N
517	130	9	\N	\N
518	130	3	\N	\N
519	130	6	\N	\N
520	130	11	\N	\N
521	131	7	\N	\N
522	131	3	\N	\N
523	131	6	\N	\N
524	131	11	\N	\N
525	132	7	\N	\N
526	132	3	\N	\N
527	132	6	\N	\N
528	132	11	\N	\N
529	133	9	\N	\N
530	133	3	\N	\N
531	133	6	\N	\N
532	133	11	\N	\N
533	134	9	\N	\N
534	134	3	\N	\N
535	134	6	\N	\N
536	134	10	\N	\N
537	135	7	\N	\N
538	135	3	\N	\N
539	135	6	\N	\N
540	135	11	\N	\N
541	136	7	\N	\N
542	136	3	\N	\N
543	136	6	\N	\N
544	136	11	\N	\N
545	137	7	\N	\N
546	137	3	\N	\N
547	137	6	\N	\N
548	137	11	\N	\N
549	138	7	\N	\N
550	138	3	\N	\N
551	138	6	\N	\N
552	138	11	\N	\N
553	139	9	\N	\N
554	139	3	\N	\N
555	139	6	\N	\N
556	139	11	\N	\N
557	140	7	\N	\N
558	140	3	\N	\N
559	140	6	\N	\N
560	140	11	\N	\N
561	141	9	\N	\N
562	141	3	\N	\N
563	141	6	\N	\N
564	141	11	\N	\N
565	142	9	\N	\N
566	142	3	\N	\N
567	142	6	\N	\N
568	142	11	\N	\N
569	143	7	\N	\N
570	143	3	\N	\N
571	143	6	\N	\N
572	143	11	\N	\N
573	144	7	\N	\N
574	144	3	\N	\N
575	144	6	\N	\N
576	144	11	\N	\N
577	145	7	\N	\N
578	145	3	\N	\N
579	145	6	\N	\N
580	145	11	\N	\N
581	146	7	\N	\N
582	146	3	\N	\N
583	146	6	\N	\N
584	146	11	\N	\N
585	147	7	\N	\N
586	147	3	\N	\N
587	147	6	\N	\N
588	147	11	\N	\N
589	148	9	\N	\N
590	148	3	\N	\N
591	148	6	\N	\N
592	148	11	\N	\N
593	149	9	\N	\N
594	149	3	\N	\N
595	149	6	\N	\N
596	149	10	\N	\N
597	150	9	\N	\N
598	150	3	\N	\N
599	150	6	\N	\N
600	150	10	\N	\N
601	151	7	\N	\N
602	151	3	\N	\N
603	151	6	\N	\N
604	151	11	\N	\N
605	152	9	\N	\N
606	152	3	\N	\N
607	152	6	\N	\N
608	152	11	\N	\N
609	153	7	\N	\N
610	153	3	\N	\N
611	153	6	\N	\N
612	153	11	\N	\N
613	154	7	\N	\N
614	154	3	\N	\N
615	154	6	\N	\N
616	154	11	\N	\N
617	155	7	\N	\N
618	155	3	\N	\N
619	155	6	\N	\N
620	155	11	\N	\N
621	156	9	\N	\N
622	156	3	\N	\N
623	156	6	\N	\N
624	156	11	\N	\N
625	157	7	\N	\N
626	157	3	\N	\N
627	157	6	\N	\N
628	157	11	\N	\N
629	158	7	\N	\N
630	158	3	\N	\N
631	158	6	\N	\N
632	158	11	\N	\N
633	159	7	\N	\N
634	159	3	\N	\N
635	159	6	\N	\N
636	159	11	\N	\N
637	160	7	\N	\N
638	160	3	\N	\N
639	160	6	\N	\N
640	160	11	\N	\N
641	161	9	\N	\N
642	161	3	\N	\N
643	161	6	\N	\N
644	161	11	\N	\N
645	162	7	\N	\N
646	162	3	\N	\N
647	162	6	\N	\N
648	162	11	\N	\N
649	163	9	\N	\N
650	163	3	\N	\N
651	163	6	\N	\N
652	163	11	\N	\N
653	164	9	\N	\N
654	164	3	\N	\N
655	164	6	\N	\N
656	164	11	\N	\N
657	165	7	\N	\N
658	165	3	\N	\N
659	165	6	\N	\N
660	165	11	\N	\N
661	166	7	\N	\N
662	166	3	\N	\N
663	166	6	\N	\N
664	166	11	\N	\N
665	167	7	\N	\N
666	167	3	\N	\N
667	167	6	\N	\N
668	167	11	\N	\N
669	168	7	\N	\N
670	168	3	\N	\N
671	168	6	\N	\N
672	168	11	\N	\N
673	169	7	\N	\N
674	169	3	\N	\N
675	169	6	\N	\N
676	169	11	\N	\N
677	170	7	\N	\N
678	170	3	\N	\N
679	170	6	\N	\N
680	170	11	\N	\N
681	171	9	\N	\N
682	171	3	\N	\N
683	171	6	\N	\N
684	171	11	\N	\N
685	172	7	\N	\N
686	172	3	\N	\N
687	172	6	\N	\N
688	172	11	\N	\N
689	173	7	\N	\N
690	173	3	\N	\N
691	173	6	\N	\N
692	173	11	\N	\N
693	174	9	\N	\N
694	174	3	\N	\N
695	174	6	\N	\N
696	174	11	\N	\N
\.


--
-- Data for Name: criterias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.criterias (id, code, name, created_at, updated_at, deleted_at) FROM stdin;
1	C1	HARGA	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
2	C2	WATT	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
3	C3	GARANSI	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
4	C4	KAPASITAS	2025-01-19 06:43:34	2025-01-19 06:43:34	\N
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: hasils; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.hasils (id, model, nama, harga, watt, kapasitas, garansi, gambar, ahp, created_at, updated_at, user_result_id) FROM stdin;
2	SJ-120SP	Sanken	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
3	RC-5SLN	Toshiba	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
4	JAX-R10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
5	SR-JQ105	Panasonic	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
6	NP-HBC10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
7	NS-TSQ10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
8	JKT-S10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.33796296296296	\N	\N	3
9	RC50M - BE01A	Gaboor	Mahal	Banyak	Besar	Lama	https://via	0.31990740740741	\N	\N	3
10	HD3115	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
11	SR-CEZ18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
12	CRJ-6601	Cosmos	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
13	KS-T18TL	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
14	NS-ZLH18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
15	MC-3900	Yong Ma	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
16	MB-FS5017	Midea	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
17	RC-18NT	Toshiba	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
18	ERC6503W	Electrolux	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
19	MT-99E	Maimete 	Mahal	Sedang	Sedang	Standar	https://via	0.31990740740741	\N	\N	3
20	SJ-150	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
21	SJ-2200	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
22	SJ-2060	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
23	SJ-1999	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
24	SJ-3000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
25	MCM-612	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
26	MCM-528	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
27	MCM-606A	Miyako	Mahal	Banyak	Sedang	Standar	https://via	0.31990740740741	\N	\N	3
28	MCM-508 SBC	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
29	SJ-2000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
30	RZ-D18F	Hitachi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
31	MRJ-180	Maspion	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
32	OX-200	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
33	KRC-389	Kirin	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
34	RC650	Black & Decker	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
35	CR 1500	Modena	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
36	JNP-1800	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
37	Joy Rice Cooker	Pigeon	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
38	RK1028	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
39	SC-28B	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
40	SRC-520	National	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
41	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
42	MB-FS5015	Midea	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
43	HD3132	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
44	SR-ZX105	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
45	ERC3505	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
46	RH-21210	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
47	JBV-S10U	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
48	MC-3500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
49	HD3129	Philips	Murah	Banyak	Besar	Lama	https://via	0.31990740740741	\N	\N	3
50	KS-N18MG	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
51	SR-TEM18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
52	MB-FS5018	Midea	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
53	RK5001	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
54	SJ-5000	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
55	OX-214	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
56	KRC-390	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
57	SC-28B Digital	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
58	SRC-660	National	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
59	CH-200	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
60	RC-18	Ichiko	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
61	IL-213	Idealife	Murah	Banyak	Besar	Lama	https://via	0.31990740740741	\N	\N	3
62	ARC-180	Advance	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
63	SJ-300	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
64	OX-316	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
65	RK1045	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
66	PRC-501	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
67	Super Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
68	CRJ-3301	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
69	OX-202	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
70	MRJ-208	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
71	R2	Mito	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
72	HD3132/33	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
73	MCM-609	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
74	KSR19ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
75	IL-210S	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
76	Super Cook Plus	Bolde	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
77	CRL 1500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
78	MC-1500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
79	SJ-130	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
80	HD3119/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
81	CH-500	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
82	CRJ-6606	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
83	PRC-1901	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
84	SC-23D	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
85	CRJ-323	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
86	MRJ-205	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
87	OX-203	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
88	Super Cook Pro	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
89	R5	Mito	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
90	HD3115/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
91	SR-GA421	Panasonic	Mahal	Banyak	Besar	Lama	https://via	0.31990740740741	\N	\N	3
92	KS-TH18	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
93	CRL 500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
94	MC-3500D	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
95	SJ-450	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
96	MCM-508	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
97	SRC-560	National	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
98	CH-500B	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
99	RK1041	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
100	RH-21210-D	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
101	NS-RPC10	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
102	IL-208	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
103	CRJ-2801	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
104	KSR 23ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
105	KRC-120	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
106	HD3128	Philips	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
107	SR-DF181	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
108	ERC-2205	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
109	OX-350	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
110	SC-37A	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
111	SJ-330	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
112	R3	Mito	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
113	MC-4500D	Yong Ma	Murah	Banyak	Besar	Lama	https://via	0.31990740740741	\N	\N	3
114	CRJ-2501	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
115	CRL-505	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
116	Crystal Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
117	PRC-125	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
118	CH-300	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
119	HD3126/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
120	NP-NVC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
121	SR-CN108	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
122	RK812	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
123	KRC-115	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
124	SRC-880	National	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
125	SC-39C	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
126	KSR 31ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
127	OX-460	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
128	CRJ-5001	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
129	PSG-705	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
130	SJ-900	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
131	MC-4500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
132	Super Eco Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
133	R6	Mito	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
134	HD3038	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
135	SC-21	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
136	CRJ-2038	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
137	OX-253	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
138	PSG-607	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
139	CRL 300	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
140	SJ-130D	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
141	PRC-121	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
142	KS-N18IH	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
143	IL-217	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
144	SR-DF181W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
145	RH-22700-56	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
146	CRJ-2201	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
147	SJ-200	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
148	KRC-126	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
149	MRJ-197	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
150	Super Deluxe Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
151	OX-456	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
152	ERC-2403	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
153	HD3030/30	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
154	PSG-605	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
155	KSR19SN	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
156	IL-213	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
157	SR-ZX185W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
158	MC-2500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
159	SRC-900	National	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
160	CRJ-2002	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
161	R7	Mito	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
162	RK202	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
163	CRL 600	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
164	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
165	RH-23520	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
166	SC-24	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
167	PRC-123	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
168	KRC-120SS	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
169	CRJ-328	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
170	MRJ-228	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
171	IL-214	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
172	SR-ZX205	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
173	HD3127	Philips	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
174	CRL 800	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
175	OX-355	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.31990740740741	\N	\N	3
176	RC50M - BE01A	Gaboor	Mahal	Banyak	Besar	Lama	https://via	0.33333333333333	\N	\N	4
177	HD3115	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
178	SR-CEZ18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
179	CRJ-6601	Cosmos	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
180	KS-T18TL	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
181	NS-ZLH18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
182	MC-3900	Yong Ma	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
183	MB-FS5017	Midea	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
184	RC-18NT	Toshiba	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
185	ERC6503W	Electrolux	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
186	MT-99E	Maimete 	Mahal	Sedang	Sedang	Standar	https://via	0.33333333333333	\N	\N	4
187	SJ-150	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
188	SJ-2200	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
189	SJ-120SP	Sanken	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
190	SJ-2060	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
191	SJ-1999	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
192	SJ-3000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
193	MCM-612	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
194	MCM-528	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
195	MCM-606A	Miyako	Mahal	Banyak	Sedang	Standar	https://via	0.33333333333333	\N	\N	4
196	MCM-508 SBC	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
197	SJ-2000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
198	RZ-D18F	Hitachi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
199	MRJ-180	Maspion	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
200	OX-200	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
201	KRC-389	Kirin	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
202	RC650	Black & Decker	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
203	CR 1500	Modena	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
204	JNP-1800	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
205	Joy Rice Cooker	Pigeon	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
206	RK1028	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
207	SC-28B	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
208	SRC-520	National	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
209	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
210	MB-FS5015	Midea	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
211	HD3132	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
212	SR-ZX105	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
213	ERC3505	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
214	RH-21210	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
215	RC-5SLN	Toshiba	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
216	JBV-S10U	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
217	MC-3500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
218	HD3129	Philips	Murah	Banyak	Besar	Lama	https://via	0.33333333333333	\N	\N	4
219	KS-N18MG	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
220	SR-TEM18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
221	MB-FS5018	Midea	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
222	RK5001	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
223	SJ-5000	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
224	OX-214	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
225	KRC-390	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
226	SC-28B Digital	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
227	SRC-660	National	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
228	CH-200	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
229	RC-18	Ichiko	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
230	IL-213	Idealife	Murah	Banyak	Besar	Lama	https://via	0.33333333333333	\N	\N	4
231	ARC-180	Advance	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
232	SJ-300	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
233	OX-316	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
234	RK1045	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
235	PRC-501	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
236	Super Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
237	CRJ-3301	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
238	OX-202	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
239	MRJ-208	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
240	R2	Mito	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
241	HD3132/33	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
242	MCM-609	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
243	KSR19ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
244	IL-210S	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
245	Super Cook Plus	Bolde	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
246	CRL 1500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
247	MC-1500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
248	SJ-130	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
249	HD3119/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
250	CH-500	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
251	CRJ-6606	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
252	PRC-1901	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
253	SC-23D	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
254	CRJ-323	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
255	MRJ-205	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
256	OX-203	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
257	Super Cook Pro	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
258	R5	Mito	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
259	HD3115/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
260	SR-GA421	Panasonic	Mahal	Banyak	Besar	Lama	https://via	0.33333333333333	\N	\N	4
261	KS-TH18	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
262	CRL 500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
263	MC-3500D	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
264	SJ-450	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
265	MCM-508	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
266	SRC-560	National	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
267	CH-500B	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
268	RK1041	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
269	RH-21210-D	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
270	NS-RPC10	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
271	IL-208	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
272	CRJ-2801	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
273	KSR 23ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
274	KRC-120	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
275	HD3128	Philips	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
276	SR-DF181	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
277	ERC-2205	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
278	OX-350	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
279	SC-37A	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
280	SJ-330	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
281	R3	Mito	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
282	MC-4500D	Yong Ma	Murah	Banyak	Besar	Lama	https://via	0.33333333333333	\N	\N	4
283	CRJ-2501	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
284	CRL-505	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
285	Crystal Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
286	PRC-125	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
287	CH-300	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
288	HD3126/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
289	NP-NVC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
290	SR-CN108	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
291	JAX-R10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
292	RK812	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
293	KRC-115	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
294	SRC-880	National	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
295	SC-39C	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
296	KSR 31ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
297	OX-460	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
298	CRJ-5001	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
299	PSG-705	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
300	SJ-900	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
301	MC-4500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
302	Super Eco Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
303	R6	Mito	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
304	SR-JQ105	Panasonic	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
305	HD3038	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
306	SC-21	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
307	CRJ-2038	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
308	OX-253	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
309	NP-HBC10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
310	PSG-607	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
311	CRL 300	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
312	SJ-130D	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
313	PRC-121	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
314	KS-N18IH	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
315	IL-217	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
316	SR-DF181W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
317	RH-22700-56	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
318	CRJ-2201	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
319	SJ-200	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
320	KRC-126	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
321	MRJ-197	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
322	Super Deluxe Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
323	OX-456	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
324	NS-TSQ10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
325	JKT-S10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.33333333333333	\N	\N	4
326	ERC-2403	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
327	HD3030/30	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
328	PSG-605	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
329	KSR19SN	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
330	IL-213	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
331	SR-ZX185W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
332	MC-2500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
333	SRC-900	National	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
334	CRJ-2002	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
335	R7	Mito	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
336	RK202	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
337	CRL 600	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
338	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
339	RH-23520	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
340	SC-24	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
341	PRC-123	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
342	KRC-120SS	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
343	CRJ-328	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
344	MRJ-228	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
345	IL-214	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
346	SR-ZX205	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
347	HD3127	Philips	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
348	CRL 800	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
349	OX-355	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.33333333333333	\N	\N	4
350	SJ-120SP	Sanken	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
351	RC-5SLN	Toshiba	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
352	JAX-R10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
353	SR-JQ105	Panasonic	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
354	NP-HBC10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
355	NS-TSQ10	Zojirushi	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
356	JKT-S10U	Tiger	Mahal	Banyak	Kecil	Lama	https://via	0.35555555555556	\N	\N	5
357	RC50M - BE01A	Gaboor	Mahal	Banyak	Besar	Lama	https://via	0.32222222222222	\N	\N	5
358	HD3115	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
359	SR-CEZ18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
360	CRJ-6601	Cosmos	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
361	KS-T18TL	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
362	NS-ZLH18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
363	MC-3900	Yong Ma	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
364	MB-FS5017	Midea	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
365	RC-18NT	Toshiba	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
366	ERC6503W	Electrolux	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
367	MT-99E	Maimete 	Mahal	Sedang	Sedang	Standar	https://via	0.32222222222222	\N	\N	5
368	SJ-150	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
369	SJ-2200	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
370	SJ-2060	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
371	SJ-1999	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
372	SJ-3000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
373	MCM-612	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
374	MCM-528	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
375	MCM-606A	Miyako	Mahal	Banyak	Sedang	Standar	https://via	0.32222222222222	\N	\N	5
376	MCM-508 SBC	Miyako	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
377	SJ-2000	Sanken	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
378	RZ-D18F	Hitachi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
379	MRJ-180	Maspion	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
380	OX-200	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
381	KRC-389	Kirin	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
382	RC650	Black & Decker	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
383	CR 1500	Modena	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
384	JNP-1800	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
385	Joy Rice Cooker	Pigeon	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
386	RK1028	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
387	SC-28B	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
388	SRC-520	National	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
389	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
390	MB-FS5015	Midea	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
391	HD3132	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
392	SR-ZX105	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
393	ERC3505	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
394	RH-21210	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
395	JBV-S10U	Tiger	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
396	MC-3500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
397	HD3129	Philips	Murah	Banyak	Besar	Lama	https://via	0.32222222222222	\N	\N	5
398	KS-N18MG	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
399	SR-TEM18	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
400	MB-FS5018	Midea	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
401	RK5001	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
402	SJ-5000	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
403	OX-214	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
404	KRC-390	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
405	SC-28B Digital	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
406	SRC-660	National	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
407	CH-200	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
408	RC-18	Ichiko	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
409	IL-213	Idealife	Murah	Banyak	Besar	Lama	https://via	0.32222222222222	\N	\N	5
410	ARC-180	Advance	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
411	SJ-300	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
412	OX-316	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
413	RK1045	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
414	PRC-501	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
415	Super Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
416	CRJ-3301	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
417	OX-202	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
418	MRJ-208	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
419	R2	Mito	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
420	HD3132/33	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
421	MCM-609	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
422	KSR19ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
423	IL-210S	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
424	Super Cook Plus	Bolde	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
425	CRL 1500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
426	MC-1500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
427	SJ-130	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
428	HD3119/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
429	CH-500	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
430	CRJ-6606	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
431	PRC-1901	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
432	SC-23D	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
433	CRJ-323	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
434	MRJ-205	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
435	OX-203	Oxone	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
436	Super Cook Pro	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
437	R5	Mito	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
438	HD3115/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
439	SR-GA421	Panasonic	Mahal	Banyak	Besar	Lama	https://via	0.32222222222222	\N	\N	5
440	KS-TH18	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
441	CRL 500	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
442	MC-3500D	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
443	SJ-450	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
444	MCM-508	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
445	SRC-560	National	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
446	CH-500B	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
447	RK1041	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
448	RH-21210-D	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
449	NS-RPC10	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
450	IL-208	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
451	CRJ-2801	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
452	KSR 23ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
453	KRC-120	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
454	HD3128	Philips	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
455	SR-DF181	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
456	ERC-2205	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
457	OX-350	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
458	SC-37A	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
459	SJ-330	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
460	R3	Mito	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
461	MC-4500D	Yong Ma	Murah	Banyak	Besar	Lama	https://via	0.32222222222222	\N	\N	5
462	CRJ-2501	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
463	CRL-505	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
464	Crystal Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
465	PRC-125	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
466	CH-300	Mitochiba	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
467	HD3126/33	Philips	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
468	NP-NVC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
469	SR-CN108	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
470	RK812	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
471	KRC-115	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
472	SRC-880	National	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
473	SC-39C	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
474	KSR 31ST	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
475	OX-460	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
476	CRJ-5001	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
477	PSG-705	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
478	SJ-900	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
479	MC-4500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
480	Super Eco Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
481	R6	Mito	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
482	HD3038	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
483	SC-21	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
484	CRJ-2038	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
485	OX-253	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
486	PSG-607	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
487	CRL 300	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
488	SJ-130D	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
489	PRC-121	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
490	KS-N18IH	Sharp	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
491	IL-217	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
492	SR-DF181W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
493	RH-22700-56	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
494	CRJ-2201	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
495	SJ-200	Sanken	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
496	KRC-126	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
497	MRJ-197	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
498	Super Deluxe Cook	BOLDe	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
499	OX-456	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
500	ERC-2403	Electrolux	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
501	HD3030/30	Philips	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
502	PSG-605	Miyako	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
503	KSR19SN	Sharp	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
504	IL-213	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
505	SR-ZX185W	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
506	MC-2500	Yong Ma	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
507	SRC-900	National	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
508	CRJ-2002	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
509	R7	Mito	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
510	RK202	Tefal	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
511	CRL 600	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
512	NS-ZCC18	Zojirushi	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
513	RH-23520	Russell Hobbs	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
514	SC-24	Denpoo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
515	PRC-123	Polytron	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
516	KRC-120SS	Kirin	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
517	CRJ-328	Cosmos	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
518	MRJ-228	Maspion	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
519	IL-214	Idealife	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
520	SR-ZX205	Panasonic	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
521	HD3127	Philips	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
522	CRL 800	Turbo	Murah	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
523	OX-355	Oxone	Mahal	Banyak	Sedang	Lama	https://via	0.32222222222222	\N	\N	5
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2021_05_27_100107_create_criterias_table	1
5	2021_05_27_100121_create_alternatives_table	1
6	2021_05_30_093521_create_subcriterias_table	1
7	2021_06_03_135625_create_comparisons_table	1
8	2021_06_08_111302_create_hasils_table	1
9	2025_01_10_034244_create_user_results_table	1
10	2025_01_10_035719_hasil_adduserresult	1
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: sub_criterias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sub_criterias (id, criteria_id, code, name, value, operator, weight, created_at, updated_at) FROM stdin;
1	3	KS004	Cepat	1	>=	1	2025-01-19 06:43:34	2025-01-19 06:43:34
2	3	KS005	Standar	2	>=	2	2025-01-19 06:43:34	2025-01-19 06:43:34
3	3	KS006	Lama	3	>=	3	2025-01-19 06:43:34	2025-01-19 06:43:34
4	2	KS007	Sedikit	150	>=	1	2025-01-19 06:43:34	2025-01-19 06:43:34
5	2	KS008	Sedang	200	>=	2	2025-01-19 06:43:34	2025-01-19 06:43:34
6	2	KS009	Banyak	300	>=	3	2025-01-19 06:43:34	2025-01-19 06:43:34
7	1	KS0010	Murah	100000	>=	1	2025-01-19 06:43:34	2025-01-19 06:43:34
8	1	KS0011	Sedang	150000	>=	2	2025-01-19 06:43:34	2025-01-19 06:43:34
10	4	KS0013	Kecil	1	>=	1	2025-01-19 06:43:34	2025-01-19 06:43:34
11	4	KS0014	Sedang	2	>=	2	2025-01-19 06:43:34	2025-01-19 06:43:34
12	4	KS0015	Besar	3	>=	3	2025-01-19 06:43:34	2025-01-19 06:43:34
9	1	KS00161	Mahal	3000000	>=	3	2025-01-19 06:43:34	2025-01-19 06:43:34
\.


--
-- Data for Name: user_results; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.user_results (id, user_id, created_at, updated_at) FROM stdin;
3	1	2025-01-19 08:38:06	2025-01-19 08:38:06
4	1	2025-01-19 08:52:39	2025-01-19 08:52:39
5	1	2025-01-19 09:07:25	2025-01-19 09:07:25
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, role, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Admin	Admin	admin@gmail.com	\N	$2y$10$G/qLBHJIAPpelNJV9AXqsOP0tmEem9fq3iz8im4TceFjPYOiTNro.	\N	2025-01-19 06:43:34	2025-01-19 06:43:34
2	Dafa	Admin	dafadzikri08@gmail.com	\N	$2y$10$MXcB/bctoyVe8GdgfE9.yOcF59lLpVbmdn0kNQnDG2Ey2LEvJw6Ym	\N	2025-01-19 06:43:34	2025-01-19 06:43:34
3	Customer Coba 01	Customer	cust01@gmail.com	\N	$2y$10$w/EzQcF1vYCDpsKRgXL6tuDszTagBeTUxi5vdJCn9I8denjWMDE82	\N	2025-01-19 06:43:34	2025-01-19 06:43:34
4	Customer Coba 02	Customer	cust02@gmail.com	\N	$2y$10$J43PpOhwg2qvv5cuZ8ZWq.dI4kBvyas1DdUNpKrijNERrEkuQusMO	\N	2025-01-19 06:43:34	2025-01-19 06:43:34
\.


--
-- Name: alternatives_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alternatives_id_seq', 174, true);


--
-- Name: comparisons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comparisons_id_seq', 696, true);


--
-- Name: criterias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.criterias_id_seq', 4, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: hasils_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.hasils_id_seq', 523, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 10, true);


--
-- Name: sub_criterias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sub_criterias_id_seq', 23, true);


--
-- Name: user_results_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_results_id_seq', 5, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- Name: alternatives alternatives_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alternatives
    ADD CONSTRAINT alternatives_pkey PRIMARY KEY (id);


--
-- Name: comparisons comparisons_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comparisons
    ADD CONSTRAINT comparisons_pkey PRIMARY KEY (id);


--
-- Name: criterias criterias_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.criterias
    ADD CONSTRAINT criterias_code_unique UNIQUE (code);


--
-- Name: criterias criterias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.criterias
    ADD CONSTRAINT criterias_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: hasils hasils_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hasils
    ADD CONSTRAINT hasils_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: sub_criterias sub_criterias_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_criterias
    ADD CONSTRAINT sub_criterias_code_unique UNIQUE (code);


--
-- Name: sub_criterias sub_criterias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_criterias
    ADD CONSTRAINT sub_criterias_pkey PRIMARY KEY (id);


--
-- Name: user_results user_results_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_results
    ADD CONSTRAINT user_results_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: comparisons comparisons_alternative_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comparisons
    ADD CONSTRAINT comparisons_alternative_id_foreign FOREIGN KEY (alternative_id) REFERENCES public.alternatives(id) ON DELETE CASCADE;


--
-- Name: comparisons comparisons_sub_criteria_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comparisons
    ADD CONSTRAINT comparisons_sub_criteria_id_foreign FOREIGN KEY (sub_criteria_id) REFERENCES public.sub_criterias(id) ON DELETE CASCADE;


--
-- Name: hasils hasils_user_result_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hasils
    ADD CONSTRAINT hasils_user_result_id_foreign FOREIGN KEY (user_result_id) REFERENCES public.user_results(id) ON DELETE CASCADE;


--
-- Name: sub_criterias sub_criterias_criteria_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sub_criterias
    ADD CONSTRAINT sub_criterias_criteria_id_foreign FOREIGN KEY (criteria_id) REFERENCES public.criterias(id) ON DELETE CASCADE;


--
-- Name: user_results user_results_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.user_results
    ADD CONSTRAINT user_results_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

